<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | LinkUp</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,450;0,9..144,560;0,9..144,650;1,9..144,500&family=IBM+Plex+Mono:wght@400;500&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4EFE4;
            background-image:
                repeating-linear-gradient(0deg, rgba(20,33,61,0.045) 0px, rgba(20,33,61,0.045) 1px, transparent 1px, transparent 34px),
                repeating-linear-gradient(90deg, rgba(20,33,61,0.045) 0px, rgba(20,33,61,0.045) 1px, transparent 1px, transparent 34px);
        }

        .font-display { font-family: 'Fraunces', serif; }
        .font-mono { font-family: 'IBM Plex Mono', monospace; }

        .ink   { color: #14213D; }
        .bg-ink { background-color: #14213D; }
        .brass { color: #B0763A; }
        .bg-brass { background-color: #B0763A; }
        .bg-parchment { background-color: #FBF8F1; }

        /* index-tab notch on the card */
        .tab {
            position: absolute;
            top: -28px;
            left: 40px;
            padding: 7px 18px 9px;
            border-radius: 8px 8px 0 0;
            background: #14213D;
            box-shadow: 0 -2px 0 rgba(0,0,0,0.06) inset;
        }

        /* field styled like a ruled line on an index card, not a boxed input */
        .card-field {
            border: none;
            border-bottom: 1.5px solid #D8CFB8;
            border-radius: 0;
            background: transparent;
            padding: 10px 2px 10px 30px;
            transition: border-color .2s ease;
        }
        .card-field:focus {
            outline: none;
            border-bottom-color: #14213D;
        }
        .field-wrap:focus-within .field-icon { color: #14213D; }

        input::placeholder { color: #B7AF9C; }

        /* stacked contact-card illustration */
        .stack-card {
            position: absolute;
            width: 220px;
            border-radius: 10px;
            background: #FBF8F1;
            box-shadow: 0 18px 34px rgba(0,0,0,0.35);
            padding: 16px 18px;
        }

        @keyframes driftIn {
            from { opacity: 0; transform: translateY(10px) rotate(var(--r, 0deg)); }
            to   { opacity: 1; transform: translateY(0) rotate(var(--r, 0deg)); }
        }
        .stack-card { animation: driftIn .7s cubic-bezier(.2,.7,.2,1) both; }

        @media (prefers-reduced-motion: reduce) {
            .stack-card { animation: none; }
        }
    </style>
</head>

<body>

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-5xl bg-parchment rounded-2xl overflow-hidden shadow-2xl shadow-black/20 grid lg:grid-cols-2 border border-[#E7DFC9]">

            <!-- Left — the "drawer": a card catalog of connections, standing in for the network graph -->
            <div class="hidden lg:flex relative flex-col justify-between p-10 bg-ink overflow-hidden">

                <!-- faint ruled drawer lines -->
                <div class="absolute inset-0 opacity-[0.05]"
                     style="background-image: repeating-linear-gradient(0deg, #fff 0px, #fff 1px, transparent 1px, transparent 40px);">
                </div>

                <div class="relative z-10 flex items-center gap-2.5">
                    <span class="font-mono text-[11px] tracking-[0.3em] text-[#E3C089] border border-[#E3C089]/40 rounded px-2 py-1">No. 001</span>
                    <span class="font-display text-lg font-medium text-white tracking-tight">LinkUp</span>
                </div>

                <!-- the stack -->
                <div class="relative z-10 flex-1 flex items-center justify-center my-10">
                    <div class="relative w-[260px] h-[220px]">

                        <div class="stack-card" style="--r:-9deg; transform: rotate(-9deg) translate(-30px, 30px); z-index:1;">
                            <div class="w-8 h-8 rounded-full bg-[#E7E1D2] mb-3"></div>
                            <div class="h-2 w-24 bg-[#E7E1D2] rounded-full mb-2"></div>
                            <div class="h-1.5 w-16 bg-[#EFEADF] rounded-full"></div>
                        </div>

                        <div class="stack-card" style="--r:6deg; transform: rotate(6deg) translate(28px, 10px); z-index:2; animation-delay:.08s;">
                            <div class="w-8 h-8 rounded-full bg-[#D9C8A6] mb-3"></div>
                            <div class="h-2 w-20 bg-[#E7E1D2] rounded-full mb-2"></div>
                            <div class="h-1.5 w-14 bg-[#EFEADF] rounded-full"></div>
                        </div>

                        <div class="stack-card" style="--r:-2deg; transform: rotate(-2deg) translate(-4px, -18px); z-index:3; animation-delay:.16s;">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-8 h-8 rounded-full bg-[#B0763A]"></div>
                                <span class="font-mono text-[9px] tracking-[0.2em] text-[#8A8272]">ACTIVE</span>
                            </div>
                            <div class="h-2 w-28 bg-[#14213D]/80 rounded-full mb-2"></div>
                            <div class="h-1.5 w-20 bg-[#14213D]/30 rounded-full"></div>
                        </div>

                    </div>
                </div>

                <div class="relative z-10 max-w-sm">
                    <p class="font-mono uppercase text-[11px] tracking-[0.25em] text-[#E3C089] mb-3">Your directory, kept current</p>
                    <h1 class="font-display text-3xl leading-[1.18] font-medium text-white mb-3">
                        Every connection,<br>filed and findable.
                    </h1>
                    <p class="text-[#C9CEDB] leading-7 text-sm">
                        Sign back in to pick up conversations and introductions
                        right where you left them.
                    </p>
                </div>

            </div>

            <!-- Right — the form, styled as a filled-in index card -->
            <div class="p-6 sm:p-10 lg:p-12 flex flex-col relative">

                <!-- mobile brand mark -->
                <div class="lg:hidden flex items-center gap-2 mb-8">
                    <span class="font-mono text-[10px] tracking-[0.3em] ink border border-[#14213D]/30 rounded px-2 py-1">No. 001</span>
                    <span class="font-display text-lg font-medium ink">LinkUp</span>
                </div>

                <div class="relative bg-white rounded-xl border border-[#E7DFC9] px-7 pt-9 pb-8 shadow-sm">

                    <div class="tab">
                        <span class="font-mono text-[10px] tracking-[0.25em] text-white">SIGN&nbsp;IN</span>
                    </div>

                    <div class="mb-7">
                        <h2 class="font-display text-2xl font-medium ink">Welcome back</h2>
                        <p class="text-[#8A8272] text-sm mt-1">Enter your details to open your file.</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-5 rounded-lg bg-[#FBEAEA] border border-[#E9C6C6] px-4 py-3">
                            <ul class="text-[#9A3B3B] text-xs space-y-1 font-medium">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="mb-5 rounded-lg bg-[#EEF3EA] border border-[#CBDCC0] px-4 py-3">
                            <span class="text-[#4C6B3C] text-xs font-medium">{{ session('status') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.store') }}" class="space-y-5">

                        @csrf

                        <div>
                            <label class="font-mono block text-[10px] tracking-[0.2em] uppercase text-[#8A8272] mb-1">Email address</label>
                            <div class="relative field-wrap">
                                <span class="field-icon absolute left-0 bottom-2.5 text-[#B7AF9C] transition-colors">
                                    <svg class="w-[16px] h-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </span>
                                <input type="email" name="email" value="{{ old('email') }}" autofocus
                                    placeholder="jane@example.com"
                                    class="card-field w-full ink text-sm">
                            </div>
                        </div>

                        <div>
                            <label class="font-mono block text-[10px] tracking-[0.2em] uppercase text-[#8A8272] mb-1">Password</label>
                            <div class="relative field-wrap">
                                <span class="field-icon absolute left-0 bottom-2.5 text-[#B7AF9C] transition-colors">
                                    <svg class="w-[16px] h-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </span>
                                <input type="password" name="password" placeholder="••••••••"
                                    class="card-field w-full ink text-sm">
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-1">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remember"
                                    class="rounded border-[#D8CFB8] text-[#14213D] focus:ring-[#14213D]/25">
                                <span class="text-sm text-[#5B5647]">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-medium ink hover:brass transition">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <button type="submit"
                            class="w-full bg-ink hover:bg-brass transition-colors text-white font-semibold py-3 rounded-lg shadow-md flex items-center justify-center gap-2 group mt-2">
                            Sign in
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12l-7.5 7.5M21 12H3" />
                            </svg>
                        </button>

                    </form>

                </div>

                <p class="mt-6 text-center text-[#8A8272] text-sm">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="ink font-semibold hover:brass transition">Create one</a>
                </p>

            </div>

        </div>

    </div>

</body>

</html>
