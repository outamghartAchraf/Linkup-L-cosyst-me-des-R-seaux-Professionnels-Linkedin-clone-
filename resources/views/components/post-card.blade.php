<article x-data="{ showComments: false }"
    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition-all hover:shadow-md hover:shadow-slate-200/40">

    {{-- Header --}}
    <div class="mb-3 flex items-start gap-3">

        {{-- Avatar --}}
        <div
            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-100/70 font-semibold text-sm text-blue-700 ring-2 ring-blue-50">

            @if ($post->user->image_url)
                <a href=" ">

                    <img src="{{ asset('storage/' . $post->user->image_url) }}" class="h-11 w-11 rounded-full object-cover">

                </a>
            @else
                <a href=" ">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-semibold">

                        {{ strtoupper(substr($post->user->name, 0, 2)) }}

                    </div>

                </a>
            @endif

        </div>

        <div class="flex-1">
            <p class="text-sm font-semibold text-slate-900">{{ $post->user->name }}</p>
            <p class="text-xs font-medium text-slate-400 mt-0.5 leading-normal">{{ $post->user->headline }}</p>
            <p class="mt-1 flex items-center gap-1 text-[10px] font-medium text-slate-400">
                <i class="ti ti-clock text-xs" aria-hidden="true"></i> {{ $post->created_at->diffForHumans() }}
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
        {{ $post->content }}
    </p>

    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="mb-4 w-full rounded-xl object-cover">
    @endif

    @if ($post->video)
        <video controls class="mb-4 w-full rounded-xl">
            <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
            Your browser does not support video.
        </video>
    @endif

    <div class="mt-2 flex gap-1">
        <button
            class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i
                class="ti ti-thumb-up text-base" aria-hidden="true"></i> J'aime</button>
        <button
            class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i
                class="ti ti-message-circle text-base" aria-hidden="true"></i> Commenter</button>
        <button
            class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i
                class="ti ti-repeat text-base" aria-hidden="true"></i> Partager</button>
        <button
            class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i
                class="ti ti-send text-base" aria-hidden="true"></i> Envoyer</button>
    </div>
</article>
