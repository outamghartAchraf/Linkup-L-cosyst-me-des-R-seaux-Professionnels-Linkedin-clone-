<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Connect with professionals, share ideas and grow your career with LinkUp.">
    <title>LinkUp — Build your professional network</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        [id] { scroll-margin-top: 5.5rem; }
        .bg-grid-pattern {
            background-size: 32px 32px;
            background-image:
                linear-gradient(to right, rgba(226, 232, 240, 0.5) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(226, 232, 240, 0.5) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased selection:bg-blue-600 selection:text-white">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 border-b border-slate-200/75 bg-white/85 backdrop-blur-md">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-5 py-3.5 lg:px-8" aria-label="Main navigation">
            <a href="{{ route('posts.index') }}" class="flex items-center gap-2 text-xl font-extrabold tracking-tight text-slate-900" aria-label="LinkUp home">
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white shadow-sm shadow-blue-600/20">
                    <i class="ti ti-link text-lg"></i>
                </span>
                <span>Link<span class="text-blue-600">Up</span></span>
            </a>

            <button id="mobile-menu-toggle" type="button"
                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500 md:hidden"
                aria-controls="landing-menu" aria-expanded="false" aria-label="Open navigation menu">
                <i class="ti ti-menu-2 text-lg" aria-hidden="true"></i>
            </button>

            <div id="landing-menu" class="absolute left-0 right-0 top-full hidden border-b border-slate-200 bg-white p-5 shadow-xl md:static md:flex md:items-center md:gap-8 md:border-0 md:bg-transparent md:p-0 md:shadow-none">
                <div class="flex flex-col gap-1 md:flex-row md:items-center md:gap-6">
                    <a href="#home" class="rounded-md px-2.5 py-1.5 text-sm font-medium text-slate-600 transition hover:text-slate-950">Home</a>
                    <a href="#features" class="rounded-md px-2.5 py-1.5 text-sm font-medium text-slate-600 transition hover:text-slate-950">Features</a>
                    <a href="#how-it-works" class="rounded-md px-2.5 py-1.5 text-sm font-medium text-slate-600 transition hover:text-slate-950">How it works</a>
                    <a href="#about" class="rounded-md px-2.5 py-1.5 text-sm font-medium text-slate-600 transition hover:text-slate-950">About</a>
                </div>
                <div class="mt-4 flex flex-col gap-2.5 border-t border-slate-100 pt-4 md:mt-0 md:flex-row md:items-center md:border-0 md:pt-0">
                    @auth
                        <a href="{{ route('posts.index') }}" class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-800">
                            Go to Feed <i class="ti ti-arrow-up-right text-base"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-lg px-3.5 py-2 text-center text-sm font-medium text-slate-700 transition hover:bg-slate-100 hover:text-slate-950">Log in</a>
                        <a href="{{ route('register') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-center text-sm font-medium text-white shadow-sm shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Sign up</a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section id="home" class="relative overflow-hidden border-b border-slate-200/80 bg-slate-50/70 bg-grid-pattern">
            <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-white to-transparent"></div>
            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-white to-transparent"></div>

            <div class="relative mx-auto grid max-w-6xl items-center gap-12 px-5 py-16 sm:py-24 lg:grid-cols-12 lg:gap-12 lg:px-8">
                <!-- Left Copy -->
                <div class="lg:col-span-6">
                    <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3.5 py-1.5 text-xs font-medium text-slate-700 shadow-xs">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-blue-600"></span>
                        </span>
                        Professional networking, simplified
                    </div>

                    <h1 class="text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl lg:leading-[1.12]">
                        Build your network. <br class="hidden sm:inline">
                        <span class="text-blue-600">Share what matters.</span>
                    </h1>

                    <p class="mt-5 max-w-lg text-base leading-relaxed text-slate-600 sm:text-lg">
                        Connect with professionals in your field, publish ideas without the noise, and discover opportunities that move your career forward.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                        @auth
                            <a href="{{ route('posts.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm shadow-blue-600/25 transition hover:bg-blue-700">
                                Open Your Feed <i class="ti ti-arrow-right text-base" aria-hidden="true"></i>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm shadow-blue-600/25 transition hover:bg-blue-700">
                                Create Free Account <i class="ti ti-arrow-right text-base" aria-hidden="true"></i>
                            </a>
                        @endauth
                        <a href="#features" class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 shadow-xs transition hover:border-slate-400 hover:bg-slate-50">
                            Explore Features
                        </a>
                    </div>

                    <div class="mt-8 flex items-center gap-6 border-t border-slate-200/80 pt-6 text-xs font-medium text-slate-500">
                        <span class="flex items-center gap-1.5"><i class="ti ti-check text-blue-600 text-base"></i> Clean, focused feed</span>
                        <span class="flex items-center gap-1.5"><i class="ti ti-check text-blue-600 text-base"></i> Rich media posts</span>
                        <span class="flex items-center gap-1.5"><i class="ti ti-check text-blue-600 text-base"></i> Direct connections</span>
                    </div>
                </div>

                <!-- Right UI Preview Window -->
                <div class="lg:col-span-6" aria-label="Preview of the LinkUp platform interface">
                    <div class="relative mx-auto max-w-lg">
                        <!-- Subtle ambient glow -->
                        <div class="absolute -inset-2 rounded-3xl bg-gradient-to-tr from-blue-600/10 via-sky-400/10 to-transparent blur-xl"></div>

                        <!-- App Frame -->
                        <div class="relative overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-2xl shadow-slate-900/10">
                            <!-- Browser Top Bar -->
                            <div class="flex items-center justify-between border-b border-slate-100 bg-slate-50/90 px-4 py-2.5">
                                <div class="flex items-center gap-1.5">
                                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300"></span>
                                </div>
                                <div class="rounded-md border border-slate-200/80 bg-white px-3 py-0.5 text-[11px] font-medium text-slate-400">
                                    linkup.app/feed
                                </div>
                                <div class="w-8"></div>
                            </div>

                            <!-- Mock App Content -->
                            <div class="p-4 sm:p-5">
                                <!-- Composer Box -->
                                <div class="rounded-xl border border-slate-200/80 bg-slate-50/50 p-3.5">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                            AM
                                        </div>
                                        <div class="flex-1 rounded-lg border border-slate-200 bg-white px-3.5 py-2 text-xs text-slate-400">
                                            Share an update, project, or insight…
                                        </div>
                                    </div>
                                    <div class="mt-3 flex items-center justify-between border-t border-slate-200/60 pt-2.5">
                                        <div class="flex gap-3 text-slate-500">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-medium"><i class="ti ti-photo text-blue-600"></i> Photo</span>
                                            <span class="inline-flex items-center gap-1 text-[11px] font-medium"><i class="ti ti-video text-emerald-600"></i> Video</span>
                                        </div>
                                        <span class="rounded-md bg-blue-600 px-3 py-1 text-[11px] font-semibold text-white">Post</span>
                                    </div>
                                </div>

                                <!-- Feed Post Card -->
                                <article class="mt-4 rounded-xl border border-slate-200/80 bg-white p-4 shadow-xs">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2.5">
                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-xs font-bold text-white">
                                                SK
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-1.5">
                                                    <p class="text-xs font-bold text-slate-900">Sarah Jenkins</p>
                                                    <span class="rounded bg-blue-50 px-1.5 py-0.5 text-[10px] font-semibold text-blue-700">Product Lead</span>
                                                </div>
                                                <p class="text-[11px] text-slate-400">2h ago · Public</p>
                                            </div>
                                        </div>
                                        <span class="rounded-md border border-slate-200 px-2 py-0.5 text-[11px] font-medium text-blue-600">+ Follow</span>
                                    </div>

                                    <p class="mt-3 text-xs leading-relaxed text-slate-600">
                                        Just shipped our new API architecture after three weeks of testing. Keeping interfaces simple makes collaboration twice as fast.
                                    </p>

                                    <div class="mt-3 flex items-center justify-between rounded-lg border border-slate-100 bg-slate-50 px-3 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <span class="flex h-7 w-7 items-center justify-center rounded-md bg-blue-100 text-blue-700">
                                                <i class="ti ti-file-code text-sm"></i>
                                            </span>
                                            <div>
                                                <p class="text-[11px] font-semibold text-slate-800">Architecture Notes v2.4</p>
                                                <p class="text-[10px] text-slate-400">Attached media preview</p>
                                            </div>
                                        </div>
                                        <i class="ti ti-bookmark text-sm text-slate-400"></i>
                                    </div>

                                    <div class="mt-3.5 flex items-center justify-between border-t border-slate-100 pt-2.5 text-[11px] font-medium text-slate-500">
                                        <div class="flex gap-4">
                                            <span class="flex items-center gap-1 text-blue-600"><i class="ti ti-thumb-up-filled"></i> 48</span>
                                            <span class="flex items-center gap-1"><i class="ti ti-message-circle"></i> 12</span>
                                            <span class="flex items-center gap-1"><i class="ti ti-repeat"></i> 6</span>
                                        </div>
                                        <span class="text-slate-400"><i class="ti ti-bookmark"></i> Save</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="mx-auto max-w-6xl px-5 py-20 lg:px-8 lg:py-24">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-wider text-blue-600">Core Features</p>
                <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">Everything you need to grow your presence</h2>
                <p class="mt-3 text-base text-slate-600">Built without clutter so you can focus on authentic conversations and useful content.</p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @php
                    $features = [
                        ['ti-id-badge-2', 'Professional Profiles', 'Create a clean profile that highlights your background, skills, and what you are currently building.'],
                        ['ti-photo-plus', 'Posts & Rich Media', 'Share your thoughts alongside images and videos to showcase projects and milestones.'],
                        ['ti-messages', 'Meaningful Discussions', 'React with likes and join focused comment threads with peers in your industry.'],
                        ['ti-user-plus', 'Curated Network', 'Follow professionals whose work inspires you and tailor your feed to your interests.'],
                        ['ti-repeat', 'One-Click Reposts', 'Amplify valuable insights from your network and add your own perspective.'],
                        ['ti-bookmarks', 'Saved Collections', 'Bookmark helpful posts and resources so you can easily revisit them anytime.'],
                    ];
                @endphp

                @foreach ($features as [$icon, $title, $description])
                    <article class="group rounded-2xl border border-slate-200/90 bg-white p-6 transition-all duration-200 hover:border-blue-300 hover:shadow-md hover:shadow-slate-900/5">
                        <div class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200/80 bg-slate-50 text-xl text-slate-700 transition-colors group-hover:border-blue-600 group-hover:bg-blue-600 group-hover:text-white">
                            <i class="ti {{ $icon }}" aria-hidden="true"></i>
                        </div>
                        <h3 class="mt-5 text-base font-bold text-slate-900">{{ $title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $description }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- How It Works -->
        <section id="how-it-works" class="border-y border-slate-200/80 bg-slate-50/60">
            <div class="mx-auto max-w-6xl px-5 py-20 lg:px-8 lg:py-24">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-xs font-bold uppercase tracking-wider text-blue-600">Workflow</p>
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">Get started in three simple steps</h2>
                </div>

                <ol class="mt-14 grid gap-8 md:grid-cols-3">
                    @foreach ([
                        ['01', 'Set up your profile', 'Sign up in seconds, add your details, and introduce your professional story to the community.'],
                        ['02', 'Follow & publish', 'Follow people in your field and start sharing posts, updates, and media with your network.'],
                        ['03', 'Engage & grow', 'Comment on ideas, repost great content, and save posts that help you learn and advance.'],
                    ] as [$number, $title, $description])
                        <li class="relative rounded-2xl border border-slate-200/90 bg-white p-7 shadow-xs">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 font-mono text-xs font-bold text-blue-600">
                                {{ $number }}
                            </span>
                            <h3 class="mt-5 text-lg font-bold text-slate-900">{{ $title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $description }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="mx-auto max-w-6xl px-5 py-20 lg:px-8 lg:py-24">
            <div class="grid items-center gap-10 rounded-3xl border border-slate-200 bg-slate-50/50 p-8 sm:p-12 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <p class="text-xs font-bold uppercase tracking-wider text-blue-600">About LinkUp</p>
                    <h2 class="mt-2 text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">
                        Built for genuine professional connection.
                    </h2>
                </div>
                <div class="lg:col-span-7">
                    <p class="text-base leading-relaxed text-slate-600">
                        LinkUp was designed around a simple idea: professional networking works best when it stays focused on real people and real work. Whether you are sharing what you are learning, showcasing a project, or following industry peers, LinkUp gives you a calm, reliable space to build lasting connections.
                    </p>
                </div>
            </div>
        </section>

        <!-- Bottom CTA -->
        <section class="mx-auto max-w-6xl px-5 pb-20 lg:px-8 lg:pb-24">
            <div class="relative overflow-hidden rounded-3xl bg-slate-900 px-6 py-14 text-center sm:px-12 sm:py-16">
                <div class="pointer-events-none absolute -top-24 left-1/2 h-64 w-96 -translate-x-1/2 rounded-full bg-blue-600/25 blur-3xl"></div>
                <div class="relative mx-auto max-w-2xl">
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Ready to join the conversation?
                    </h2>
                    <p class="mt-4 text-base text-slate-300">
                        Create your LinkUp profile today and start connecting with professionals around the world.
                    </p>
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                        @auth
                            <a href="{{ route('posts.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-blue-500">
                                Go to Your Feed <i class="ti ti-arrow-right" aria-hidden="true"></i>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-blue-500">
                                Get Started Free <i class="ti ti-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-800/60 px-6 py-3.5 text-sm font-semibold text-slate-200 transition hover:bg-slate-800 hover:text-white">
                                Log in
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-6xl px-5 py-12 lg:px-8">
            <div class="flex flex-col justify-between gap-8 sm:flex-row sm:items-center">
                <div>
                    <a href="{{ route('posts.index') }}" class="flex items-center gap-2 text-lg font-extrabold tracking-tight text-slate-900">
                        <span class="flex h-7 w-7 items-center justify-center rounded-md bg-blue-600 text-white">
                            <i class="ti ti-link text-sm"></i>
                        </span>
                        <span>Link<span class="text-blue-600">Up</span></span>
                    </a>
                    <p class="mt-2.5 text-sm text-slate-500">Share ideas, build connections, and grow your career.</p>
                </div>

                <div class="flex flex-wrap gap-6 text-sm font-medium text-slate-600">
                    <a href="#home" class="transition hover:text-blue-600">Home</a>
                    <a href="#features" class="transition hover:text-blue-600">Features</a>
                    <a href="#how-it-works" class="transition hover:text-blue-600">How it works</a>
                    <a href="#about" class="transition hover:text-blue-600">About</a>
                    @guest
                        <a href="{{ route('login') }}" class="transition hover:text-blue-600">Login</a>
                        <a href="{{ route('register') }}" class="transition hover:text-blue-600">Sign up</a>
                    @endguest
                </div>
            </div>

            <div class="mt-8 flex flex-col justify-between gap-4 border-t border-slate-100 pt-6 text-xs text-slate-400 sm:flex-row">
                <p>&copy; {{ now()->year }} LinkUp. All rights reserved.</p>
                <p>Built for professionals.</p>
            </div>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const landingMenu = document.getElementById('landing-menu');

        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', String(!isExpanded));
            menuToggle.setAttribute('aria-label', isExpanded ? 'Open navigation menu' : 'Close navigation menu');
            landingMenu.classList.toggle('hidden', isExpanded);
        });

        landingMenu.querySelectorAll('a[href^="#"]').forEach((link) => {
            link.addEventListener('click', () => {
                landingMenu.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.setAttribute('aria-label', 'Open navigation menu');
            });
        });
    </script>
</body>
</html>
