<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | LinkUp</title>

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

        .tab {
            position: absolute;
            top: -28px;
            left: 40px;
            padding: 7px 18px 9px;
            border-radius: 8px 8px 0 0;
            background: #14213D;
            box-shadow: 0 -2px 0 rgba(0,0,0,0.06) inset;
        }

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
        .card-field.field-error {
            border-bottom-color: #B0453D;
        }
        .field-wrap:focus-within .field-icon { color: #14213D; }

        input::placeholder { color: #B7AF9C; }

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

        /* small dashed line to suggest a blank card being filled in, on the brand panel */
        .blank-card {
            border: 1.5px dashed rgba(255,255,255,0.35);
        }

        @media (prefers-reduced-motion: reduce) {
            .stack-card { animation: none; }
        }
    </style>
</head>

<body>

<div class="min-h-screen flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-5xl bg-parchment rounded-2xl overflow-hidden shadow-2xl shadow-black/20 grid lg:grid-cols-2 border border-[#E7DFC9]">

        <!-- Left — the drawer, this time with a fresh card being added to the stack -->
        <div class="hidden lg:flex relative flex-col justify-between p-10 bg-ink overflow-hidden">

            <div class="absolute inset-0 opacity-[0.05]"
                 style="background-image: repeating-linear-gradient(0deg, #fff 0px, #fff 1px, transparent 1px, transparent 40px);">
            </div>

            <div class="relative z-10 flex items-center gap-2.5">
                <span class="font-mono text-[11px] tracking-[0.3em] text-[#E3C089] border border-[#E3C089]/40 rounded px-2 py-1">No. 001</span>
                <span class="font-display text-lg font-medium text-white tracking-tight">LinkUp</span>
            </div>

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

                    <!-- the new, still-blank card being created -->
                    <div class="stack-card blank-card" style="--r:-2deg; transform: rotate(-2deg) translate(-4px, -18px); z-index:3; animation-delay:.16s; background: rgba(251,248,241,0.06);">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-8 h-8 rounded-full border-2 border-dashed border-[#E3C089] flex items-center justify-center">
                                <span class="text-[#E3C089] text-xs leading-none">+</span>
                            </div>
                            <span class="font-mono text-[9px] tracking-[0.2em] text-[#E3C089]">NEW ENTRY</span>
                        </div>
                        <div class="h-2 w-28 border-b border-dashed border-white/30 mb-3"></div>
                        <div class="h-1.5 w-20 border-b border-dashed border-white/20"></div>
                    </div>

                </div>
            </div>

            <div class="relative z-10 max-w-sm">
                <p class="font-mono uppercase text-[11px] tracking-[0.25em] text-[#E3C089] mb-3">Open a new file</p>
                <h1 class="font-display text-3xl leading-[1.18] font-medium text-white mb-3">
                    Where careers find<br>their next connection.
                </h1>
                <p class="text-[#C9CEDB] leading-7 text-sm">
                    Build relationships that move your work forward. Join the
                    people who hire, mentor, and collaborate through LinkUp.
                </p>
            </div>

        </div>

        <!-- Right — the form, styled as an index card being filled in -->
        <div class="p-6 sm:p-10 lg:p-12 flex flex-col relative">

            <div class="lg:hidden flex items-center gap-2 mb-8">
                <span class="font-mono text-[10px] tracking-[0.3em] ink border border-[#14213D]/30 rounded px-2 py-1">No. 001</span>
                <span class="font-display text-lg font-medium ink">LinkUp</span>
            </div>

            <div class="relative bg-white rounded-xl border border-[#E7DFC9] px-7 pt-9 pb-8 shadow-sm">

                <div class="tab">
                    <span class="font-mono text-[10px] tracking-[0.25em] text-white">NEW&nbsp;ENTRY</span>
                </div>

                <div class="mb-7">
                    <h2 class="font-display text-2xl font-medium ink">Let's set up your profile</h2>
                    <p class="text-[#8A8272] text-sm mt-1">Takes less than a minute — you can fill in the rest later.</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-5">

                    @csrf

                    <div class="grid md:grid-cols-2 gap-5">

                        <div>
                            <label class="font-mono block text-[10px] tracking-[0.2em] uppercase text-[#8A8272] mb-1">Full name</label>
                            <div class="relative field-wrap">
                                <span class="field-icon absolute left-0 bottom-2.5 text-[#B7AF9C] transition-colors">
                                    <svg class="w-[16px] h-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </span>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Jane Cooper"
                                    class="@error('name') field-error @enderror card-field w-full ink text-sm">
                            </div>
                            @error('name')
                                <p class="text-[#B0453D] text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="font-mono block text-[10px] tracking-[0.2em] uppercase text-[#8A8272] mb-1">Email</label>
                            <div class="relative field-wrap">
                                <span class="field-icon absolute left-0 bottom-2.5 text-[#B7AF9C] transition-colors">
                                    <svg class="w-[16px] h-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </span>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="jane@example.com"
                                    class="@error('email') field-error @enderror card-field w-full ink text-sm">
                            </div>
                            @error('email')
                                <p class="text-[#B0453D] text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label class="font-mono block text-[10px] tracking-[0.2em] uppercase text-[#8A8272] mb-1">Professional headline</label>
                        <div class="relative field-wrap">
                            <span class="field-icon absolute left-0 bottom-2.5 text-[#B7AF9C] transition-colors">
                                <svg class="w-[16px] h-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25v-4.25M20.25 14.15v-1.5a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25v1.5M20.25 14.15c-2.5 1.1-5.3 1.7-8.25 1.7s-5.75-.6-8.25-1.7M14.25 10.4V6.75a2.25 2.25 0 00-2.25-2.25h0a2.25 2.25 0 00-2.25 2.25v3.65" />
                                </svg>
                            </span>
                            <input type="text" name="headline" value="{{ old('headline') }}"
                                placeholder="Full Stack Developer"
                                class="@error('headline') field-error @enderror card-field w-full ink text-sm">
                        </div>
                        @error('headline')
                            <p class="text-[#B0453D] text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">

                        <div>
                            <label class="font-mono block text-[10px] tracking-[0.2em] uppercase text-[#8A8272] mb-1">Password</label>
                            <div class="relative field-wrap">
                                <span class="field-icon absolute left-0 bottom-2.5 text-[#B7AF9C] transition-colors">
                                    <svg class="w-[16px] h-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </span>
                                <input type="password" name="password"
                                    placeholder="••••••••"
                                    class="@error('password') field-error @enderror card-field w-full ink text-sm">
                            </div>
                            @error('password')
                                <p class="text-[#B0453D] text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="font-mono block text-[10px] tracking-[0.2em] uppercase text-[#8A8272] mb-1">Confirm password</label>
                            <div class="relative field-wrap">
                                <span class="field-icon absolute left-0 bottom-2.5 text-[#B7AF9C] transition-colors">
                                    <svg class="w-[16px] h-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </span>
                                <input type="password" name="password_confirmation"
                                    placeholder="••••••••"
                                    class="@error('password_confirmation') field-error @enderror card-field w-full ink text-sm">
                            </div>
                            @error('password_confirmation')
                                <p class="text-[#B0453D] text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <button type="submit"
                        class="w-full bg-ink hover:bg-brass transition-colors text-white font-semibold py-3 rounded-lg shadow-md flex items-center justify-center gap-2 group mt-2">
                        Create account
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>

                </form>

            </div>

            <p class="mt-6 text-center text-[#8A8272] text-sm">
                Already on LinkUp?
                <a href="{{ route('login') }}" class="ink font-semibold hover:brass transition">Sign in</a>
            </p>

        </div>

    </div>

</div>

</body>
</html>
