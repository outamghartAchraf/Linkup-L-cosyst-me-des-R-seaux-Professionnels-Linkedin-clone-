<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | LinkUp</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,500;0,600;0,700;1,500&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F7F5F0;
        }

        .font-display {
            font-family: 'Fraunces', serif;
        }

        @keyframes nodePulse {

            0%,
            100% {
                opacity: .55;
            }

            50% {
                opacity: 1;
            }
        }

        .node-pulse {
            animation: nodePulse 3.6s ease-in-out infinite;
            transform-origin: center;
        }

        @media (prefers-reduced-motion: reduce) {
            .node-pulse {
                animation: none;
            }
        }

        input::placeholder {
            color: #9CA3AF;
        }
    </style>
</head>

<body>

    <div class="min-h-screen flex items-center justify-center px-4 py-6">

        <div
            class="w-full max-w-5xl bg-white rounded-3xl overflow-hidden shadow-2xl shadow-slate-300/40 grid lg:grid-cols-2">

            <!-- Left Side — brand panel (same signature illustration as the register page, for continuity) -->

            <div class="hidden lg:flex relative overflow-hidden flex-col justify-between p-10"
                style="background: linear-gradient(165deg, #0B1F3A 0%, #071527 100%);">

                <svg class="absolute inset-0 w-full h-full" viewBox="0 0 600 800" preserveAspectRatio="xMidYMid slice"
                    aria-hidden="true">
                    <g stroke="#9FB3D1" stroke-width="1" opacity="0.28">
                        <line x1="90" y1="130" x2="190" y2="70" />
                        <line x1="190" y1="70" x2="270" y2="170" />
                        <line x1="90" y1="130" x2="130" y2="250" />
                        <line x1="270" y1="170" x2="350" y2="100" />
                        <line x1="270" y1="170" x2="430" y2="210" />
                        <line x1="270" y1="170" x2="300" y2="290" />
                        <line x1="130" y1="250" x2="300" y2="290" />
                        <line x1="130" y1="250" x2="70" y2="350" />
                        <line x1="300" y1="290" x2="210" y2="390" />
                        <line x1="300" y1="290" x2="390" y2="350" />
                        <line x1="350" y1="100" x2="430" y2="210" />
                        <line x1="430" y1="210" x2="390" y2="350" />
                        <line x1="70" y1="350" x2="210" y2="390" />
                        <line x1="210" y1="390" x2="150" y2="470" />
                        <line x1="210" y1="390" x2="290" y2="490" />
                        <line x1="390" y1="350" x2="470" y2="430" />
                        <line x1="390" y1="350" x2="430" y2="530" />
                        <line x1="150" y1="470" x2="290" y2="490" />
                        <line x1="290" y1="490" x2="430" y2="530" />
                        <line x1="150" y1="470" x2="90" y2="570" />
                        <line x1="290" y1="490" x2="370" y2="630" />
                        <line x1="90" y1="570" x2="230" y2="610" />
                        <line x1="230" y1="610" x2="290" y2="490" />
                        <line x1="430" y1="530" x2="490" y2="590" />
                        <line x1="90" y1="570" x2="170" y2="690" />
                        <line x1="230" y1="610" x2="330" y2="730" />
                        <line x1="370" y1="630" x2="330" y2="730" />
                        <line x1="370" y1="630" x2="450" y2="710" />
                        <line x1="490" y1="590" x2="450" y2="710" />
                        <line x1="170" y1="690" x2="330" y2="730" />
                    </g>
                    <g>
                        <circle cx="90" cy="130" r="3.5" fill="#FFFFFF" opacity="0.5" />
                        <circle cx="190" cy="70" r="3" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="270" cy="170" r="5.5" fill="#C99A44" class="node-pulse" />
                        <circle cx="130" cy="250" r="3.5" fill="#FFFFFF" opacity="0.5" />
                        <circle cx="350" cy="100" r="3.5" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="430" cy="210" r="3" fill="#FFFFFF" opacity="0.5" />
                        <circle cx="300" cy="290" r="6.5" fill="#C99A44" class="node-pulse" />
                        <circle cx="70" cy="350" r="3" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="210" cy="390" r="3.5" fill="#FFFFFF" opacity="0.5" />
                        <circle cx="390" cy="350" r="3" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="470" cy="430" r="3.5" fill="#FFFFFF" opacity="0.5" />
                        <circle cx="150" cy="470" r="3" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="290" cy="490" r="5.5" fill="#C99A44" class="node-pulse" />
                        <circle cx="430" cy="530" r="3" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="90" cy="570" r="3.5" fill="#FFFFFF" opacity="0.5" />
                        <circle cx="230" cy="610" r="3" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="370" cy="630" r="3.5" fill="#FFFFFF" opacity="0.5" />
                        <circle cx="490" cy="590" r="3" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="170" cy="690" r="3" fill="#FFFFFF" opacity="0.4" />
                        <circle cx="330" cy="730" r="3.5" fill="#FFFFFF" opacity="0.45" />
                        <circle cx="450" cy="710" r="3" fill="#FFFFFF" opacity="0.4" />
                    </g>
                </svg>

                <!-- Wordmark -->
                <div class="relative z-10 flex items-center gap-2.5">
                    <svg width="28" height="28" viewBox="0 0 30 30" fill="none" aria-hidden="true">
                        <circle cx="11" cy="15" r="8.5" stroke="white" stroke-width="1.6" />
                        <circle cx="19" cy="15" r="8.5" stroke="#C99A44" stroke-width="1.6" />
                    </svg>
                    <span class="font-display text-xl font-semibold text-white tracking-tight">LinkUp</span>
                </div>

                <!-- Headline -->
                <div class="relative z-10 max-w-sm">
                    <p class="uppercase text-xs tracking-[0.25em] text-[#E3C788] font-medium mb-3">Professional network
                    </p>
                    <h1 class="font-display text-3xl leading-[1.15] font-medium text-white mb-4">
                        Pick up right where you left off.
                    </h1>
                    <p class="text-blue-100/75 leading-7 text-sm">
                        Your network, your conversations, and your next opportunity
                        are exactly where you left them.
                    </p>
                </div>

                <!-- Footer line -->
                <p class="relative z-10 text-sm text-blue-100/50">
                    Trusted by professionals, one introduction at a time.
                </p>

            </div>

            <!-- Right Side — form -->

            <div class="p-6 sm:p-10 flex flex-col">

                <!-- Mobile-only brand mark -->
                <div class="lg:hidden flex items-center gap-2 mb-6">
                    <svg width="22" height="22" viewBox="0 0 30 30" fill="none" aria-hidden="true">
                        <circle cx="11" cy="15" r="8.5" stroke="#0B1F3A" stroke-width="1.6" />
                        <circle cx="19" cy="15" r="8.5" stroke="#C99A44" stroke-width="1.6" />
                    </svg>
                    <span class="font-display text-lg font-semibold text-[#0B1F3A]">LinkUp</span>
                </div>

                <div class="mb-6">
                    <p class="uppercase text-xs tracking-[0.2em] text-[#C99A44] font-semibold mb-2">Welcome back</p>
                    <h2 class="font-display text-2xl font-semibold text-[#0B1F3A]">
                        Sign in to LinkUp
                    </h2>
                    <p class="text-gray-500 text-sm mt-1">
                        Good to see you again.
                    </p>
                </div>

                @if ($errors->any())

                    <div class="mb-5 rounded-2xl bg-red-50 border border-red-200 p-4 flex gap-3">

                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-red-500" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>

                        <ul class="text-red-700 text-sm space-y-1">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                @if (session('status'))
                    <div
                        class="mb-5 rounded-2xl bg-emerald-50 border border-emerald-200 p-4 flex gap-3 text-emerald-700">

                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span class="text-sm">{{ session('status') }}</span>

                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-4">

                    @csrf

                    <div>

                        <label class="text-sm font-medium text-gray-700">
                            Email Address
                        </label>

                        <div class="relative mt-1.5">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                                <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" autofocus
                                placeholder="jane@example.com"
                                class="w-full rounded-xl border border-gray-300 pl-11 pr-4 py-2.5 text-[#1E2433] focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/15 outline-none transition">
                        </div>

                    </div>

                    <div>

                        <label class="text-sm font-medium text-gray-700">
                            Password
                        </label>

                        <div class="relative mt-1.5">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                                <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </span>
                            <input type="password" name="password" placeholder="••••••••"
                                class="w-full rounded-xl border border-gray-300 pl-11 pr-4 py-2.5 text-[#1E2433] focus:border-[#0B1F3A] focus:ring-2 focus:ring-[#0B1F3A]/15 outline-none transition">
                        </div>

                    </div>

                    <div class="flex items-center justify-between">

                        <label class="flex items-center gap-2 cursor-pointer">

                            <input type="checkbox" name="remember"
                                class="rounded border-gray-300 text-[#0B1F3A] focus:ring-[#0B1F3A]/30">

                            <span class="text-sm text-gray-600">
                                Remember me
                            </span>

                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-medium text-[#0B1F3A] hover:text-[#C99A44] transition">
                                Forgot password?
                            </a>
                        @endif

                    </div>

                    <button type="submit"
                        class="w-full bg-[#0B1F3A] hover:bg-[#071527] transition text-white font-semibold py-3 rounded-xl shadow-lg shadow-[#0B1F3A]/20 flex items-center justify-center gap-2 group">
                        Sign in
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5L21 12l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>

                </form>

                <p class="mt-6 text-center text-gray-600 text-sm">

                    Don't have an account?

                    <a href="{{ route('register') }}"
                        class="text-[#0B1F3A] font-semibold hover:text-[#C99A44] transition">
                        Create one
                    </a>

                </p>

            </div>

        </div>

    </div>

</body>

</html>
