<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LinkUp — Premium Professional Network || @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-blue-500 selection:text-white">

    @include('layouts.nav')

    <div
        class="mx-auto max-w-6xl grid grid-cols-1 gap-5 px-4 py-6 md:grid-cols-[240px_1fr] lg:grid-cols-[240px_1fr_260px]">

        {{-- Left Sidebar --}}
        @hasSection('left-sidebar')
            @yield('left-sidebar')
        @else
            @include('components.left-sidebar')
        @endif

        <main class="flex flex-col gap-4" aria-label="News feed">
            @yield('content')
        </main>


        @hasSection('right-sidebar')
            @yield('right-sidebar')
        @else
            @include('components.right-sidebar')
        @endif

    </div>

     @include('layouts.footer')
</body>

</html>
