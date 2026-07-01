<header class="sticky top-0 z-50 w-full border-b border-slate-200/80 bg-white/80 backdrop-blur-md transition-all">

    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-2.5">

        {{-- Left --}}
        <div class="flex flex-1 items-center gap-6">

            <a
                href="{{ route('posts.index') }}"
                class="text-xl font-bold tracking-tight text-blue-600 transition-transform hover:scale-102">

                Link<span class="font-light text-slate-400">Up</span>

            </a>

            <div class="hidden max-w-md flex-1 items-center gap-2 rounded-full bg-slate-100 px-4 py-2 ring-1 ring-slate-200/50 transition-all focus-within:bg-white focus-within:ring-blue-500/50 focus-within:shadow-sm md:flex">

                <i class="ti ti-search text-base text-slate-400"></i>

                <form
                    action=" "
                    method="GET"
                    class="w-full">

                    <input
                        type="text"
                        name="q"
                        class="w-full border-none bg-transparent text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none"
                        placeholder="Search professionals, posts, jobs…"
                        value="{{ request('q') }}">

                </form>

            </div>

        </div>

        {{-- Right Navigation --}}
        <nav class="flex items-center gap-1">

            {{-- Feed --}}
            <a
                href="{{ route('posts.index') }}"
                class="group flex flex-col items-center gap-1 rounded-xl px-4 py-1.5 {{ request()->routeIs('posts.*') ? 'bg-blue-50/60 text-blue-600 font-medium' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all' }}">

                <i class="ti ti-home text-xl"></i>

                <span class="text-[10px] tracking-wide">
                    Feed
                </span>

            </a>
                     {{-- Network --}}
            <a

                class="group flex flex-col items-center gap-1 rounded-xl px-4 py-1.5 {{ request()->routeIs('connections.*') ? 'text-blue-600 bg-blue-50/60 font-medium' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all' }}">

                <span class="relative inline-block">

                    <i class="ti ti-users text-xl transition-transform group-hover:scale-105"></i>

                    @if(isset($pendingRequests) && $pendingRequests > 0)

                        <span class="absolute -right-0.5 -top-0.5 h-2 w-2 rounded-full border border-white bg-rose-500 animate-pulse"></span>

                    @endif

                </span>

                <span class="text-[10px] tracking-wide">

                    Network

                </span>

            </a>

            {{-- Jobs --}}
            <a
                href="#"
                class="group flex flex-col items-center gap-1 rounded-xl px-4 py-1.5 text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">

                <i class="ti ti-briefcase text-xl transition-transform group-hover:scale-105"></i>

                <span class="text-[10px] tracking-wide">

                    Jobs

                </span>

            </a>

            {{-- Messages --}}
            <a
                href="#"
                class="group flex flex-col items-center gap-1 rounded-xl px-4 py-1.5 text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">

                <span class="relative inline-block">

                    <i class="ti ti-message text-xl transition-transform group-hover:scale-105"></i>

                    <span class="absolute -right-0.5 -top-0.5 h-2 w-2 rounded-full border border-white bg-rose-500"></span>

                </span>

                <span class="text-[10px] tracking-wide">

                    Messages

                </span>

            </a>

            {{-- Alerts --}}
            <a
                href="#"
                class="group flex flex-col items-center gap-1 rounded-xl px-4 py-1.5 text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">

                <i class="ti ti-bell text-xl transition-transform group-hover:scale-105"></i>

                <span class="text-[10px] tracking-wide">

                    Alerts

                </span>

            </a>

                        {{-- Profile --}}
            <div
                class="relative ml-2"
                x-data="{ open: false }">

                <button
                    @click="open = !open"
                    class="flex items-center gap-2 rounded-xl px-2 py-1.5 text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">

                    @if(auth()->user()->image_url)

                        <img
                            src="{{ asset('storage/' . auth()->user()->image_url) }}"
                            alt="{{ auth()->user()->name }}"
                            class="h-9 w-9 rounded-full object-cover">

                    @else

                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-50 font-semibold text-xs text-blue-600">

                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}

                        </div>

                    @endif

                    <i class="ti ti-chevron-down text-sm transition-transform"
                       :class="{ 'rotate-180': open }"></i>

                </button>

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-52 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-lg">

                    <div class="border-b border-slate-100 px-4 py-3">

                        <p class="truncate text-sm font-semibold text-slate-900">

                            {{ auth()->user()->name }}

                        </p>

                        <p class="truncate text-xs text-slate-500">

                            {{ auth()->user()->email }}

                        </p>

                    </div>

                    <a
                        href="{{ route('profile') }}"
                        class="flex items-center gap-2 px-4 py-3 text-xs font-medium text-slate-700 hover:bg-slate-50">

                        <i class="ti ti-user text-base"></i>

                        Profile

                    </a>

                    <form
                        action="{{ route('logout') }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="flex w-full items-center gap-2 px-4 py-3 text-left text-xs font-medium text-red-600 hover:bg-red-50">

                            <i class="ti ti-logout text-base"></i>

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </nav>

    </div>

</header>
