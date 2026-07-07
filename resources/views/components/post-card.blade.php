<article x-data="{ showComments: false }"
    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition-all hover:shadow-md hover:shadow-slate-200/40">
    @if ($post->original_post_id)
        <div class="mb-3 flex items-center gap-2 text-xs font-medium text-slate-500">

            <i class="ti ti-repeat text-base"></i>

            <span>

                {{ $post->user->name }} shared this

            </span>

        </div>
    @endif
    {{-- Header --}}
    <div class="mb-3 flex items-start gap-3">

        {{-- Avatar --}}
        <div
            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-100/70 font-semibold text-sm text-blue-700 ring-2 ring-blue-50">

            @if ($post->user->image_url)
                <a href="{{ route('users.show', $post->user) }}">

                    <img src="{{ asset('storage/' . $post->user->image_url) }}"
                        class="h-11 w-11 rounded-full object-cover">

                </a>
            @else
                <a href="{{ route('users.show', $post->user) }}">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-semibold">

                        {{ strtoupper(substr($post->user->name, 0, 2)) }}

                    </div>

                </a>
            @endif

        </div>

        <div class="flex-1">

            <div class="flex items-center gap-2">

                <a href="{{ route('users.show', $post->user) }}">
                    <p class="text-sm font-semibold text-slate-900">
                        {{ $post->user->name }}
                    </p>
                </a>

                @if (auth()->id() != $post->user_id)

                    @if (auth()->user()->following->contains($post->user))
                        <form action="{{ route('users.unfollow', $post->user) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                                class="rounded-full border border-blue-600 px-3 py-1 text-[10px] font-semibold text-blue-600 transition hover:bg-blue-600 hover:text-white">

                                Following

                            </button>

                        </form>
                    @else
                        <form action="{{ route('users.follow', $post->user) }}" method="POST">
                            @csrf

                            <button
                                class="rounded-full border border-blue-600 px-3 py-1 text-[10px] font-semibold text-blue-600 transition hover:bg-blue-600 hover:text-white">

                                + Follow

                            </button>

                        </form>
                    @endif

                @endif

            </div>

            <p class="text-xs font-medium text-slate-400 mt-0.5 leading-normal">
                {{ $post->user->headline }}
            </p>

            <p class="mt-1 flex items-center gap-1 text-[10px] font-medium text-slate-400">
                <i class="ti ti-clock text-xs"></i>
                {{ $post->created_at->diffForHumans() }}
            </p>

        </div>

        {{-- Owner Menu --}}
        @if (auth()->id() === $post->user_id)
            @can('update', $post)
                <div class="relative" x-data="{ open: false }">
                    <button @click="open=!open"
                        class="rounded-full p-1 text-slate-400 transition hover:bg-slate-50 hover:text-slate-600">
                        <i class="ti ti-dots text-lg"></i>
                    </button>

                    <div x-show="open" @click.outside="open=false" x-transition
                        class="absolute right-0 z-20 mt-2 w-40 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-lg">

                        <a href="{{ route('posts.edit', $post) }}"
                            class="flex items-center gap-2 px-4 py-3 text-xs font-medium text-slate-700 hover:bg-slate-100">
                            <i class="ti ti-edit text-base text-blue-600"></i>
                            Modifier
                        </a>
                    @endcan
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                            onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')

                            <button
                                class="flex w-full items-center gap-2 px-4 py-3 text-left text-xs font-medium text-red-600 hover:bg-red-50">
                                <i class="ti ti-trash text-base"></i>
                                Supprimer
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        @endif
    </div>

    <p class="text-xs leading-relaxed text-slate-700 font-normal mb-4">
        @if ($post->originalPost)
            <p class="text-xs leading-relaxed text-slate-700 font-normal mb-4">

                {{ $post->originalPost->content }}

            </p>
        @else
            <p class="text-xs leading-relaxed text-slate-700 font-normal mb-4">

                {{ $post->content }}

            </p>
        @endif
    </p>

    @php
        $displayPost = $post->originalPost ?? $post;
    @endphp

    @if ($displayPost->image)
        <img src="{{ asset('storage/' . $displayPost->image) }}" class="mb-4 w-full rounded-xl object-cover">
    @endif

    @if ($displayPost->video)
        <video controls class="mb-4 w-full rounded-xl">

            <source src="{{ asset('storage/' . $displayPost->video) }}" type="video/mp4">

        </video>
    @endif


    <div
        class="mb-2 flex items-center justify-between border-b border-slate-100 pb-2 text-[11px] font-medium text-slate-500">

        <div>


            {{ $post->likes->count() }}
            {{ Str::plural('Like', $post->likes->count()) }}


        </div>

        <div>

            {{ $post->reposts->count() }}
            {{ Str::plural('Share', $post->reposts->count()) }}



        </div>

        <div>

            {{ $post->comments->count() }}
            {{ Str::plural('Comment', $post->comments->count()) }}


        </div>


    </div>

    <div class="mt-2 flex gap-1">

        {{-- Like --}}
        <form action="{{ route('posts.like', $post) }}" method="POST" class="flex-1">

            @csrf

            <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold transition-all hover:bg-slate-50 hover:text-blue-600">

                @if ($post->likes->contains('user_id', auth()->id()))
                    <i class="ti ti-thumb-up text-base text-blue-600"></i>

                    <span class="text-blue-600">
                        J'aime
                    </span>
                @else
                    <i class="ti ti-thumb-up text-base"></i>

                    <span class="text-slate-500">
                        J'aime
                    </span>
                @endif

            </button>

        </form>

        {{-- Comment --}}
        <button type="button"
            @click="showComments = !showComments;
                    $nextTick(() => document.getElementById('comment-{{ $post->id }}')?.focus())"
            class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600">

            <i class="ti ti-message-circle text-base"></i>

            Commenter

        </button>

        {{-- Share --}}
        <form action="{{ route('posts.repost', $post) }}" method="POST" class="flex-1">

            @csrf

            <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600">

                <i class="ti ti-repeat text-base"></i>

                Repost

            </button>

        </form>

        {{-- Send --}}
        <button
            class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600">

            <i class="ti ti-send text-base"></i>

            Envoyer

        </button>

    </div>

    {{-- Comments --}}
    <div x-show="showComments" x-transition class="mt-4 border-t border-slate-100 pt-4">

        {{-- 1. SCROLLABLE CONTAINER START (Added max height and overflow) --}}
        <div class="max-h-[400px] overflow-y-auto pr-2">

            @foreach ($post->comments as $comment)
                <div class="mb-4 flex gap-3">

                    {{-- Avatar --}}
                    @if ($comment->user->image_url)
                        <img src="{{ asset('storage/' . $comment->user->image_url) }}"
                            class="h-8 w-8 rounded-full object-cover">
                    @else
                        <div
                            class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-[11px] font-semibold text-blue-700">

                            {{ strtoupper(substr($comment->user->name, 0, 2)) }}

                        </div>
                    @endif

                    <div class="flex-1">

                        <div class="rounded-2xl bg-slate-100 px-4 py-3">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="text-xs font-semibold text-slate-900">

                                        {{ $comment->user->name }}

                                    </p>

                                    <p class="text-[10px] text-slate-400">

                                        {{ $comment->created_at->diffForHumans() }}

                                    </p>

                                </div>

                                @if (auth()->id() === $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                        onsubmit="return confirm('Delete this comment?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="text-red-500 hover:text-red-700">

                                            <i class="ti ti-trash text-sm"></i>

                                        </button>

                                    </form>
                                @endif

                            </div>

                            <p class="mt-2 text-xs leading-relaxed text-slate-700">

                                {{ $comment->content }}

                            </p>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>
        {{-- 2. SCROLLABLE CONTAINER END --}}

        {{-- Add Comment --}}
        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4 flex items-start gap-3">

            @csrf

            {{-- Current User Avatar --}}
            @if (auth()->user()->image_url)
                <img src="{{ asset('storage/' . auth()->user()->image_url) }}"
                    class="h-8 w-8 rounded-full object-cover">
            @else
                <div
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-[11px] font-semibold text-blue-700">

                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}

                </div>
            @endif

            <div class="flex-1">

                <textarea id="comment-{{ $post->id }}" name="content" rows="2" placeholder="Écrire un commentaire..."
                    class="w-full resize-none rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs text-slate-700 outline-none transition-all focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('content') }}</textarea>

                @error('content')
                    <p class="mt-1 text-[11px] text-red-500">

                        {{ $message }}

                    </p>
                @enderror

                <div class="mt-2 flex justify-end">

                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">

                        Commenter

                    </button>

                </div>

            </div>

        </form>

    </div>

</article>
