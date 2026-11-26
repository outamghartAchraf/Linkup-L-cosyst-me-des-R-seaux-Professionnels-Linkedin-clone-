<?php

namespace Tests\Unit;

use App\Services\ImageDataUriService;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

class ImageDataUriServiceTest extends TestCase
{
    public function test_it_resizes_large_images_without_enlarging_smaller_images(): void
    {
        $service = new ImageDataUriService;

        $largeImage = $service->encode(
            UploadedFile::fake()->image('wide.png', 1600, 800),
            1080,
            78
        );
        $smallImage = $service->encode(
            UploadedFile::fake()->image('small.png', 200, 100),
            1080,
            78
        );

        $largeDimensions = $this->dimensionsFromDataUri($largeImage);
        $smallDimensions = $this->dimensionsFromDataUri($smallImage);

        $this->assertSame(1080, $largeDimensions[0]);
        $this->assertSame(540, $largeDimensions[1]);
        $this->assertSame(200, $smallDimensions[0]);
        $this->assertSame(100, $smallDimensions[1]);
    }

    public function test_webp_output_preserves_transparency_when_supported(): void
    {
        if (! function_exists('imagewebp')) {
            $this->markTestSkipped('GD WebP support is not available.');
        }

        $transparentPng = imagecreatetruecolor(20, 20);
        imagealphablending($transparentPng, false);
        imagesavealpha($transparentPng, true);
        $transparent = imagecolorallocatealpha($transparentPng, 255, 0, 0, 127);
        imagefilledrectangle($transparentPng, 0, 0, 19, 19, $transparent);

        ob_start();
        imagepng($transparentPng);
        $pngContents = ob_get_clean();
        unset($transparentPng);

        $upload = UploadedFile::fake()->createWithContent('transparent.png', $pngContents);
        $dataUri = (new ImageDataUriService)->encode($upload, 300, 80);

        $this->assertStringStartsWith('data:image/webp;base64,', $dataUri);

        $webp = base64_decode(substr($dataUri, strpos($dataUri, ',') + 1), true);
        $decodedImage = imagecreatefromstring($webp);
        $pixel = imagecolorat($decodedImage, 0, 0);

        $this->assertGreaterThanOrEqual(120, ($pixel >> 24) & 0x7F);
        unset($decodedImage);
    }

    /**
     * @return array{int, int}
     */
    private function dimensionsFromDataUri(string $dataUri): array
    {
        $this->assertMatchesRegularExpression('#^data:image/(?:webp|jpeg);base64,#', $dataUri);

        $image = base64_decode(substr($dataUri, strpos($dataUri, ',') + 1), true);
        $this->assertIsString($image);

        $dimensions = getimagesizefromstring($image);
        $this->assertNotFalse($dimensions);

        return [$dimensions[0], $dimensions[1]];
    }
}
