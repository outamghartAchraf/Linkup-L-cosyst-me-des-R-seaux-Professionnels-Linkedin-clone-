<section class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5" aria-label="Create a post">
    <form id="post-composer" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="flex items-start gap-3 sm:gap-4">
            @if (auth()->user()->avatar_url)
                <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}"
                    class="h-11 w-11 shrink-0 rounded-full border border-slate-200 object-cover">
            @else
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm font-semibold text-blue-700">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </span>
            @endif

            <div class="min-w-0 flex-1">
                <label for="post-content" class="sr-only">Post text</label>
                <textarea id="post-content" name="content" rows="4" maxlength="5000"
                    class="min-h-28 w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                    placeholder="Share an idea, an update, or something you’ve learned…">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-xs text-red-600" role="alert">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div id="media-preview" class="mt-4 hidden">
            <div class="relative overflow-hidden rounded-xl border border-slate-200 bg-slate-50">
                <img id="image-preview" class="hidden max-h-96 w-full object-contain" alt="Selected image preview">
                <video id="video-preview" class="hidden max-h-96 w-full" controls playsinline></video>
                <button id="remove-media" type="button"
                    class="absolute right-2 top-2 inline-flex items-center gap-1 rounded-lg bg-slate-900/80 px-3 py-2 text-xs font-semibold text-white transition hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-white"
                    aria-label="Remove selected media">
                    <i class="ti ti-x" aria-hidden="true"></i> Remove
                </button>
            </div>
            <p id="media-error" class="mt-2 hidden text-xs text-red-600" role="alert"></p>
        </div>

        @error('image')
            <p class="mt-2 text-xs text-red-600" role="alert">{{ $message }}</p>
        @enderror
        @error('video')
            <p class="mt-2 text-xs text-red-600" role="alert">{{ $message }}</p>
        @enderror

        <div class="mt-4 flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 pt-3">
            <div class="flex flex-wrap gap-1">
                <input id="post-image" name="image" type="file" class="sr-only"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                <label for="post-image"
                    class="inline-flex cursor-pointer items-center gap-2 rounded-lg px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-emerald-50 hover:text-emerald-700 focus-within:ring-2 focus-within:ring-emerald-500">
                    <i class="ti ti-photo text-lg text-emerald-600" aria-hidden="true"></i> Photo
                </label>

                <input id="post-video" name="video" type="file" class="sr-only"
                    accept=".mp4,.webm,video/mp4,video/webm">
                <label for="post-video"
                    class="inline-flex cursor-pointer items-center gap-2 rounded-lg px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-sky-50 hover:text-sky-700 focus-within:ring-2 focus-within:ring-sky-500">
                    <i class="ti ti-video text-lg text-sky-600" aria-hidden="true"></i> Video
                </label>
            </div>

            <button id="publish-post" type="submit" disabled
                class="inline-flex min-w-28 items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 disabled:cursor-not-allowed disabled:bg-slate-300 disabled:text-slate-500">
                <span id="publish-label">Publish</span>
                <i id="publish-spinner" class="ti ti-loader-2 hidden animate-spin" aria-hidden="true"></i>
            </button>
        </div>
    </form>
</section>

<script>
    (() => {
        const form = document.getElementById('post-composer');
        if (!form) return;

        const content = document.getElementById('post-content');
        const imageInput = document.getElementById('post-image');
        const videoInput = document.getElementById('post-video');
        const preview = document.getElementById('media-preview');
        const imagePreview = document.getElementById('image-preview');
        const videoPreview = document.getElementById('video-preview');
        const error = document.getElementById('media-error');
        const publish = document.getElementById('publish-post');
        const remove = document.getElementById('remove-media');
        let previewUrl = null;
        let submitting = false;

        const updatePublishState = () => {
            publish.disabled = submitting || (!content.value.trim() && !imageInput.files.length && !videoInput.files.length);
        };

        const clearPreview = () => {
            if (previewUrl) URL.revokeObjectURL(previewUrl);
            previewUrl = null;
            imageInput.value = '';
            videoInput.value = '';
            imagePreview.removeAttribute('src');
            videoPreview.removeAttribute('src');
            imagePreview.classList.add('hidden');
            videoPreview.classList.add('hidden');
            preview.classList.add('hidden');
            error.classList.add('hidden');
            error.textContent = '';
            updatePublishState();
        };

        const displayFile = (input, type, maxSize) => {
            const file = input.files[0];
            if (!file) return;

            const supported = type === 'image'
                ? ['image/jpeg', 'image/png', 'image/webp'].includes(file.type)
                : ['video/mp4', 'video/webm'].includes(file.type);

            if (!supported || file.size > maxSize) {
                clearPreview();
                error.textContent = !supported
                    ? `Choose a supported ${type} file.`
                    : `The ${type} must be no larger than ${type === 'image' ? '8 MB' : '50 MB'}.`;
                error.classList.remove('hidden');
                preview.classList.remove('hidden');
                return;
            }

            if (input === imageInput) videoInput.value = '';
            else imageInput.value = '';

            if (previewUrl) URL.revokeObjectURL(previewUrl);
            previewUrl = URL.createObjectURL(file);
            imagePreview.classList.toggle('hidden', type !== 'image');
            videoPreview.classList.toggle('hidden', type !== 'video');
            (type === 'image' ? imagePreview : videoPreview).src = previewUrl;
            preview.classList.remove('hidden');
            error.classList.add('hidden');
            updatePublishState();
        };

        imageInput.addEventListener('change', () => displayFile(imageInput, 'image', 8 * 1024 * 1024));
        videoInput.addEventListener('change', () => displayFile(videoInput, 'video', 50 * 1024 * 1024));
        content.addEventListener('input', updatePublishState);
        remove.addEventListener('click', clearPreview);

        form.addEventListener('submit', (event) => {
            updatePublishState();
            if (publish.disabled) {
                event.preventDefault();
                return;
            }
            submitting = true;
            publish.setAttribute('aria-busy', 'true');
            document.getElementById('publish-label').textContent = 'Publishing…';
            document.getElementById('publish-spinner').classList.remove('hidden');
            updatePublishState();
        });

        window.addEventListener('beforeunload', () => {
            if (previewUrl) URL.revokeObjectURL(previewUrl);
        });
        updatePublishState();
    })();
</script>
