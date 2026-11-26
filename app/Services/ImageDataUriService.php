<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use InvalidArgumentException;
use RuntimeException;

class ImageDataUriService
{
    public function encode(UploadedFile $file, int $maxWidth, int $quality): string
    {
        if ($maxWidth < 1 || $quality < 0 || $quality > 100) {
            throw new InvalidArgumentException('Image width and quality are outside their valid ranges.');
        }

        if (! function_exists('imagecreatefromstring')) {
            throw new RuntimeException('GD image support is required to process uploaded images.');
        }

        $contents = $file->getContent();

        if ($contents === false) {
            throw new RuntimeException('Unable to read the uploaded image.');
        }

        $source = imagecreatefromstring($contents);

        if (! $source instanceof \GdImage) {
            throw new RuntimeException('Unable to decode the uploaded image.');
        }

        $processed = $source;

        try {
            $width = imagesx($source);
            $height = imagesy($source);

            if ($width > $maxWidth) {
                $scaledHeight = max(1, (int) round($height * $maxWidth / $width));
                $processed = imagescale($source, $maxWidth, $scaledHeight, IMG_BICUBIC);

                if (! $processed instanceof \GdImage) {
                    throw new RuntimeException('Unable to resize the uploaded image.');
                }
            }

            imagealphablending($processed, false);
            imagesavealpha($processed, true);

            [$mime, $encodedImage] = $this->encodeImage($processed, $quality);

            return "data:{$mime};base64,".base64_encode($encodedImage);
        } finally {
            unset($processed, $source);
        }
    }

    /**
     * @return array{string, string}
     */
    private function encodeImage(\GdImage $image, int $quality): array
    {
        if (! ob_start()) {
            throw new RuntimeException('Unable to start image encoding.');
        }

        try {
            if (function_exists('imagewebp') && imagewebp($image, null, $quality)) {
                $contents = ob_get_contents();

                if (is_string($contents) && $contents !== '') {
                    return ['image/webp', $contents];
                }
            }

            ob_clean();
            $flattened = $this->flattenTransparency($image);

            try {
                if (! imagejpeg($flattened, null, $quality)) {
                    throw new RuntimeException('Unable to encode the uploaded image as JPEG.');
                }

                $contents = ob_get_contents();

                if (! is_string($contents) || $contents === '') {
                    throw new RuntimeException('Image encoding returned no data.');
                }

                return ['image/jpeg', $contents];
            } finally {
                unset($flattened);
            }
        } finally {
            ob_end_clean();
        }
    }

    private function flattenTransparency(\GdImage $image): \GdImage
    {
        $flattened = imagecreatetruecolor(imagesx($image), imagesy($image));

        if (! $flattened instanceof \GdImage) {
            throw new RuntimeException('Unable to prepare the uploaded image for JPEG encoding.');
        }

        imagealphablending($flattened, true);
        $background = imagecolorallocate($flattened, 255, 255, 255);

        if ($background === false || ! imagefilledrectangle(
            $flattened,
            0,
            0,
            imagesx($flattened),
            imagesy($flattened),
            $background
        ) || ! imagecopy($flattened, $image, 0, 0, 0, 0, imagesx($image), imagesy($image))) {
            unset($flattened);
            throw new RuntimeException('Unable to prepare the uploaded image for JPEG encoding.');
        }

        return $flattened;
    }
}
