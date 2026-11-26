<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | LinkUp</title>
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

            <!-- Left Column: Brand & Live Profile Card Preview -->
            <div class="hidden lg:col-span-5 lg:flex flex-col justify-between bg-slate-900 p-10 text-white relative overflow-hidden">
                <!-- Ambient Glow -->
                <div class="pointer-events-none absolute -top-24 -left-24 h-64 w-64 rounded-full bg-blue-600/25 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-24 -right-24 h-64 w-64 rounded-full bg-sky-500/15 blur-3xl"></div>

                <div class="relative z-10">
                    <span class="inline-flex items-center gap-2 rounded-full border border-slate-700/80 bg-slate-800/70 px-3 py-1 text-xs font-medium text-blue-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-blue-400"></span>
                        New Member Profile
                    </span>
                    <h1 class="mt-6 text-3xl font-extrabold tracking-tight leading-tight text-white">
                        Where careers find their next connection.
                    </h1>
                    <p class="mt-3 text-sm leading-relaxed text-slate-300">
                        Build relationships that move your work forward. Join professionals who share ideas, mentor, and collaborate on LinkUp.
                    </p>
                </div>

                <!-- Live Profile Card Preview -->
                <div class="relative z-10 my-8">
                    <p class="mb-2.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400">Live profile preview</p>
                    <div class="rounded-2xl border border-slate-700/80 bg-slate-800/75 p-5 backdrop-blur-xs shadow-lg">
                        <div class="flex items-center gap-3.5">
                            <div id="preview-avatar" class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-blue-600 text-sm font-bold text-white shadow-inner">
                                JC
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <p id="preview-name" class="truncate text-sm font-bold text-white">Jane Cooper</p>
                                    <span class="rounded bg-blue-500/20 px-1.5 py-0.5 text-[10px] font-semibold text-blue-300">Member</span>
                                </div>
                                <p id="preview-headline" class="mt-0.5 truncate text-xs text-slate-300">Full Stack Developer</p>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center justify-between border-t border-slate-700/70 pt-3 text-[11px] text-slate-400">
                            <span class="flex items-center gap-1.5"><i class="ti ti-circle-check text-emerald-400 text-sm"></i> Ready to connect</span>
                            <span>LinkUp ID</span>
                        </div>
                    </div>
                </div>

                <div class="relative z-10 border-t border-slate-800 pt-5 flex items-center justify-between text-xs text-slate-400">
                    <span>Free forever for members</span>
                    <span>Step 1 of 1</span>
                </div>
            </div>

            <!-- Right Column: Registration Form -->
            <div class="p-6 sm:p-10 lg:col-span-7 lg:p-12 flex flex-col justify-center">
                <div class="mx-auto w-full max-w-lg">
                    <div class="mb-7">
                        <h2 class="text-2xl font-extrabold tracking-tight text-slate-950">Let's set up your profile</h2>
                        <p class="mt-1.5 text-sm text-slate-600">Takes less than a minute — you can customize the rest anytime.</p>
                    </div>

                    <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                        @csrf

                        <!-- Name & Email Row -->
                        <div class="grid gap-4 sm:grid-cols-2">
                            <!-- Full Name -->
                            <div>
                                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Full name
                                </label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                        <i class="ti ti-user text-lg"></i>
                                    </span>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus
                                        placeholder="Jane Cooper"
                                        class="block w-full rounded-xl border @error('name') border-red-400 focus:border-red-500 focus:ring-red-500/15 @else border-slate-300 focus:border-blue-600 focus:ring-blue-600/10 @enderror bg-white py-2.5 pl-10 pr-3.5 text-sm text-slate-900 placeholder:text-slate-400 transition focus:outline-none focus:ring-4">
                                </div>
                                @error('name')
                                    <p class="mt-1.5 flex items-center gap-1 text-xs font-medium text-red-600">
                                        <i class="ti ti-alert-circle text-sm"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Email address
                                </label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                        <i class="ti ti-mail text-lg"></i>
                                    </span>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                                        placeholder="jane@example.com"
                                        class="block w-full rounded-xl border @error('email') border-red-400 focus:border-red-500 focus:ring-red-500/15 @else border-slate-300 focus:border-blue-600 focus:ring-blue-600/10 @enderror bg-white py-2.5 pl-10 pr-3.5 text-sm text-slate-900 placeholder:text-slate-400 transition focus:outline-none focus:ring-4">
                                </div>
                                @error('email')
                                    <p class="mt-1.5 flex items-center gap-1 text-xs font-medium text-red-600">
                                        <i class="ti ti-alert-circle text-sm"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Professional Headline -->
                        <div>
                            <label for="headline" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">
                                Professional headline
                            </label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="ti ti-briefcase text-lg"></i>
                                </span>
                                <input id="headline" type="text" name="headline" value="{{ old('headline') }}"
                                    placeholder="e.g. Full Stack Developer, Product Designer"
                                    class="block w-full rounded-xl border @error('headline') border-red-400 focus:border-red-500 focus:ring-red-500/15 @else border-slate-300 focus:border-blue-600 focus:ring-blue-600/10 @enderror bg-white py-2.5 pl-10 pr-3.5 text-sm text-slate-900 placeholder:text-slate-400 transition focus:outline-none focus:ring-4">
                            </div>
                            @error('headline')
                                <p class="mt-1.5 flex items-center gap-1 text-xs font-medium text-red-600">
                                    <i class="ti ti-alert-circle text-sm"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Passwords Row -->
                        <div class="grid gap-4 sm:grid-cols-2">
                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Password
                                </label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                        <i class="ti ti-lock text-lg"></i>
                                    </span>
                                    <input id="password" type="password" name="password"
                                        placeholder="••••••••"
                                        class="block w-full rounded-xl border @error('password') border-red-400 focus:border-red-500 focus:ring-red-500/15 @else border-slate-300 focus:border-blue-600 focus:ring-blue-600/10 @enderror bg-white py-2.5 pl-10 pr-10 text-sm text-slate-900 placeholder:text-slate-400 transition focus:outline-none focus:ring-4">
                                    <button type="button" data-toggle-target="password" aria-label="Show password"
                                        class="toggle-pw absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 transition hover:text-slate-600">
                                        <i class="ti ti-eye text-lg"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="mt-1.5 flex items-center gap-1 text-xs font-medium text-red-600">
                                        <i class="ti ti-alert-circle text-sm"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Confirm password
                                </label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                        <i class="ti ti-lock-check text-lg"></i>
                                    </span>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        placeholder="••••••••"
                                        class="block w-full rounded-xl border @error('password_confirmation') border-red-400 focus:border-red-500 focus:ring-red-500/15 @else border-slate-300 focus:border-blue-600 focus:ring-blue-600/10 @enderror bg-white py-2.5 pl-10 pr-10 text-sm text-slate-900 placeholder:text-slate-400 transition focus:outline-none focus:ring-4">
                                    <button type="button" data-toggle-target="password_confirmation" aria-label="Show password"
                                        class="toggle-pw absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 transition hover:text-slate-600">
                                        <i class="ti ti-eye text-lg"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <p class="mt-1.5 flex items-center gap-1 text-xs font-medium text-red-600">
                                        <i class="ti ti-alert-circle text-sm"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit"
                                class="group flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-blue-600/25 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-600/20">
                                Create account
                                <i class="ti ti-arrow-right text-base transition-transform group-hover:translate-x-0.5"></i>
                            </button>
                        </div>
                    </form>

                    <div class="mt-7 border-t border-slate-100 pt-6 text-center">
                        <p class="text-sm text-slate-600">
                            Already on LinkUp?
                            <a href="{{ route('login') }}" class="font-semibold text-blue-600 transition hover:text-blue-700">
                                Sign in
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
        // Toggle password visibility for both password fields
        document.querySelectorAll('.toggle-pw').forEach((btn) => {
            btn.addEventListener('click', () => {
                const input = document.getElementById(btn.dataset.toggleTarget);
                const icon = btn.querySelector('i');
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                icon.classList.toggle('ti-eye', !isPassword);
                icon.classList.toggle('ti-eye-off', isPassword);
                btn.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
            });
        });

        // Live preview card updates as user types name & headline
        const nameInput = document.getElementById('name');
        const headlineInput = document.getElementById('headline');
        const previewName = document.getElementById('preview-name');
        const previewHeadline = document.getElementById('preview-headline');
        const previewAvatar = document.getElementById('preview-avatar');

        const updatePreview = () => {
            const nameVal = nameInput.value.trim();
            const headlineVal = headlineInput.value.trim();

            previewName.textContent = nameVal || 'Jane Cooper';
            previewHeadline.textContent = headlineVal || 'Full Stack Developer';

            if (nameVal) {
                const parts = nameVal.split(/\s+/);
                const initials = parts.length > 1
                    ? (parts[0][0] + parts[parts.length - 1][0]).toUpperCase()
                    : nameVal.slice(0, 2).toUpperCase();
                previewAvatar.textContent = initials;
            } else {
                previewAvatar.textContent = 'JC';
            }
        };

        nameInput.addEventListener('input', updatePreview);
        headlineInput.addEventListener('input', updatePreview);
        updatePreview();
    </script>
</body>
</html>
