<header class="sticky top-0 z-50 w-full border-b border-slate-200/80 bg-white/95 backdrop-blur">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-2.5">
        <a href="{{ route('posts.index') }}" class="text-xl font-bold tracking-tight text-blue-700 transition hover:text-blue-800">
            Link<span class="font-light text-slate-500">Up</span>
        </a>

        <nav class="flex items-center gap-2" aria-label="Main navigation">
            <a href="{{ route('posts.index') }}"
                class="flex flex-col items-center gap-1 rounded-xl px-4 py-1.5 {{ request()->routeIs('posts.*') ? 'bg-blue-50/60 font-medium text-blue-700' : 'text-slate-500 transition hover:bg-slate-50 hover:text-slate-900' }}">
                <i class="ti ti-home text-xl" aria-hidden="true"></i>
                <span class="text-[10px] tracking-wide">Feed</span>
            </a>

            <div class="relative ml-1" x-data="{ open: false }">
                <button type="button" @click="open = !open"
                    class="flex items-center gap-2 rounded-xl px-2 py-1.5 text-slate-500 transition hover:bg-slate-50 hover:text-slate-900"
                    aria-label="Open profile menu" :aria-expanded="open">
                    @if (auth()->user()->avatar_url)
                        <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}"
                            class="h-9 w-9 rounded-full border border-slate-200 object-cover">
                    @else
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-50 text-xs font-semibold text-blue-700">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </span>
                    @endif
                    <i class="ti ti-chevron-down text-sm transition-transform" :class="{ 'rotate-180': open }" aria-hidden="true"></i>
                </button>

                <div x-cloak x-show="open" @click.outside="open = false" x-transition
                    class="absolute right-0 mt-2 w-52 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-lg">
                    <div class="border-b border-slate-100 px-4 py-3">
                        <p class="truncate text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</p>
                        <p class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</p>
                    </div>
                    <a href="{{ route('profile') }}"
                        class="flex items-center gap-2 px-4 py-3 text-xs font-medium text-slate-700 hover:bg-slate-50">
                        <i class="ti ti-user text-base" aria-hidden="true"></i> Profile
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center gap-2 px-4 py-3 text-left text-xs font-medium text-red-600 hover:bg-red-50">
                            <i class="ti ti-logout text-base" aria-hidden="true"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
