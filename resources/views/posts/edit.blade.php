@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-xs">

        <div class="mb-5">
            <h2 class="text-base font-semibold text-slate-900">
                Modifier la publication
            </h2>

            <p class="mt-1 text-xs text-slate-500">
                Update your post and share your changes.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4">
                <ul class="space-y-1 text-xs text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="flex items-start gap-3">

                {{-- Avatar --}}
                @if (auth()->user()->image_url)
                    <img src="{{ asset('storage/' . auth()->user()->image_url) }}" alt="{{ auth()->user()->name }}"
                        class="h-10 w-10 rounded-full object-cover border border-slate-200">
                @else
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 font-semibold text-xs text-blue-700">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                @endif

                <div class="flex-1">

                    <textarea name="content" rows="5"
                        class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-xs text-slate-700 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:bg-white"
                        placeholder="What's on your mind?">{{ old('content', $post->content) }}</textarea>

                </div>

            </div>

            @if ($post->image)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post image"
                        class="max-h-64 rounded-xl border border-slate-200">
                </div>
            @endif

            <div class="mt-4">
                <label class="mb-2 block text-xs font-medium text-slate-600">
                    Change Image
                </label>

                <input type="file" name="image" accept="image/*"
                    class="block w-full rounded-xl border border-slate-200 p-2 text-xs">
            </div>

            @error('image')
                <p class="mt-1 text-xs text-red-500">
                    {{ $message }}
                </p>
            @enderror

            <div class="mt-5 flex items-center justify-end gap-3 border-t border-slate-100 pt-4">

                <a href="{{ route('posts.index') }}"
                    class="rounded-xl border border-slate-200 px-5 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-100">

                    Cancel

                </a>

                <button type="submit"
                    class="rounded-xl bg-blue-600 px-5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">

                    Update Post

                </button>

            </div>

        </form>

    </div>

@endsection
