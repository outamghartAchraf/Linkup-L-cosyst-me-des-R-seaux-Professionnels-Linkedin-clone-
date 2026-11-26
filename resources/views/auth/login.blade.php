<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | LinkUp</title>
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
        .bg-grid-pattern {
            background-size: 32px 32px;
            background-image:
                linear-gradient(to right, rgba(226, 232, 240, 0.55) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(226, 232, 240, 0.55) 1px, transparent 1px);
        }
    </style>
</head>
<body class="min-h-screen bg-slate-50 bg-grid-pattern text-slate-900 antialiased selection:bg-blue-600 selection:text-white flex flex-col justify-between">

    <!-- Top Minimal Header -->
    <header class="w-full px-5 py-5 lg:px-8">
        <div class="mx-auto flex max-w-6xl items-center justify-between">
            <a href="{{ route('posts.index') }}" class="flex items-center gap-2 text-xl font-extrabold tracking-tight text-slate-900">
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white shadow-sm shadow-blue-600/20">
                    <i class="ti ti-link text-lg"></i>
                </span>
                <span>Link<span class="text-blue-600">Up</span></span>
            </a>

            <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 transition hover:text-slate-950">
                <i class="ti ti-arrow-left text-base"></i> Back to home
            </a>
        </div>
    </header>

    <!-- Main Auth Container -->
    <main class="flex-1 flex items-center justify-center px-4 py-8 sm:px-6">
        <div class="w-full max-w-5xl overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-xl shadow-slate-900/5 grid lg:grid-cols-12">

            <!-- Left Column: Brand & Network Visual (Matches Hero Aesthetic) -->
            <div class="hidden lg:col-span-5 lg:flex flex-col justify-between bg-slate-900 p-10 text-white relative overflow-hidden">
                <!-- Subtle Blue Ambient Glow -->
                <div class="pointer-events-none absolute -top-24 -left-24 h-64 w-64 rounded-full bg-blue-600/25 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-24 -right-24 h-64 w-64 rounded-full bg-sky-500/15 blur-3xl"></div>

                <div class="relative z-10">
                    <span class="inline-flex items-center gap-2 rounded-full border border-slate-700/80 bg-slate-800/70 px-3 py-1 text-xs font-medium text-blue-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-blue-400"></span>
                        Member Access
                    </span>
                    <h1 class="mt-6 text-3xl font-extrabold tracking-tight leading-tight text-white">
                        Pick up right where you left off.
                    </h1>
                    <p class="mt-3 text-sm leading-relaxed text-slate-300">
                        Sign in to check your feed, share updates with your network, and stay connected with professionals in your field.
                    </p>
                </div>

                <!-- Mini UI Card Stack Illustration -->
                <div class="relative z-10 my-8 space-y-3">
                    <div class="rounded-xl border border-slate-700/70 bg-slate-800/60 p-3.5 backdrop-blur-xs">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white">
                                SK
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="truncate text-xs font-semibold text-white">Sarah Jenkins</p>
                                <p class="truncate text-[11px] text-slate-400">Shared a new post in your network</p>
                            </div>
                            <span class="rounded bg-blue-500/15 px-2 py-0.5 text-[10px] font-medium text-blue-300">New</span>
                        </div>
                    </div>

                    <div class="rounded-xl border border-slate-800 bg-slate-800/35 p-3.5 translate-x-3">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-700 text-xs font-bold text-slate-200">
                                MR
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="truncate text-xs font-semibold text-slate-200">Marcus Reid</p>
                                <p class="truncate text-[11px] text-slate-400">Started following your profile</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative z-10 border-t border-slate-800 pt-5 flex items-center justify-between text-xs text-slate-400">
                    <span>LinkUp Network</span>
                    <span>Secure Sign-In</span>
                </div>
            </div>

            <!-- Right Column: Login Form -->
            <div class="p-6 sm:p-10 lg:col-span-7 lg:p-12 flex flex-col justify-center">
                <div class="mx-auto w-full max-w-md">
                    <div class="mb-7">
                        <h2 class="text-2xl font-extrabold tracking-tight text-slate-950">Welcome back</h2>
                        <p class="mt-1.5 text-sm text-slate-600">Enter your credentials to access your account.</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50/80 p-3.5 text-red-700">
                            <i class="ti ti-alert-circle text-lg shrink-0 mt-0.5"></i>
                            <ul class="text-xs font-medium space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="mb-5 flex items-center gap-2.5 rounded-xl border border-emerald-200 bg-emerald-50/80 p-3.5 text-emerald-700">
                            <i class="ti ti-circle-check text-lg shrink-0"></i>
                            <span class="text-xs font-medium">{{ session('status') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                        @csrf

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">
                                Email address
                            </label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="ti ti-mail text-lg"></i>
                                </span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                    placeholder="you@example.com"
                                    class="block w-full rounded-xl border border-slate-300 bg-white py-2.5 pl-10 pr-4 text-sm text-slate-900 placeholder:text-slate-400 transition focus:border-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-600/10">
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
                                    Password
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-xs font-semibold text-blue-600 transition hover:text-blue-700">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="ti ti-lock text-lg"></i>
                                </span>
                                <input id="password" type="password" name="password" required
                                    placeholder="••••••••"
                                    class="block w-full rounded-xl border border-slate-300 bg-white py-2.5 pl-10 pr-10 text-sm text-slate-900 placeholder:text-slate-400 transition focus:border-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-600/10">
                                <button type="button" id="toggle-password" aria-label="Show password"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 transition hover:text-slate-600">
                                    <i class="ti ti-eye text-lg" id="eye-icon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <label class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                                <input type="checkbox" name="remember"
                                    class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-600/20">
                                <span class="text-sm text-slate-600">Keep me signed in</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="group flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-blue-600/25 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-600/20">
                            Sign in
                            <i class="ti ti-arrow-right text-base transition-transform group-hover:translate-x-0.5"></i>
                        </button>
                    </form>

                    <div class="mt-7 border-t border-slate-100 pt-6 text-center">
                        <p class="text-sm text-slate-600">
                            Don't have an account yet?
                            <a href="{{ route('register') }}" class="font-semibold text-blue-600 transition hover:text-blue-700">
                                Create an account
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Minimal Footer -->
    <footer class="py-5 text-center text-xs text-slate-400">
        &copy; {{ now()->year }} LinkUp. All rights reserved.
    </footer>

    <script>
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.classList.toggle('ti-eye', !isPassword);
            eyeIcon.classList.toggle('ti-eye-off', isPassword);
            togglePassword.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
        });
    </script>
</body>
</html>
