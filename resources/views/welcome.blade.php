<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LinkUp — Premium Professional Network</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <style>

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-blue-500 selection:text-white">

    @include('layouts.nav')

  <div class="mx-auto max-w-6xl grid grid-cols-1 gap-5 px-4 py-6 md:grid-cols-[240px_1fr] lg:grid-cols-[240px_1fr_260px]">

    <aside class="flex flex-col gap-4" aria-label="User profile">

      <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white text-center shadow-xs transition-all hover:shadow-md hover:shadow-slate-200/50">
        <div class="h-16 bg-gradient-to-r from-blue-700 to-slate-800"></div>
        <div class="-mt-8 mx-auto mb-3 flex h-16 w-16 items-center justify-center rounded-full border-4 border-white bg-gradient-to-tr from-blue-500 to-indigo-600 font-semibold text-xl text-white shadow-sm">
          AS
        </div>
        <div class="px-5 pb-5">
          <p class="font-semibold text-slate-900 text-base">Achraf Outamghart</p>
          <p class="mt-1 text-xs leading-normal text-slate-400 font-medium">Développeur Fullstack Laravel · React</p>

          <div class="mt-5 space-y-2 border-t border-slate-100 pt-4 text-xs">
            <div class="flex justify-between text-slate-500 font-medium">
              <span>Vues du profil</span>
              <span class="font-bold text-slate-800 bg-slate-100 px-1.5 py-0.5 rounded-md">142</span>
            </div>
            <div class="flex justify-between text-slate-500 font-medium">
              <span>Apparitions</span>
              <span class="font-bold text-slate-800 bg-slate-100 px-1.5 py-0.5 rounded-md">38</span>
            </div>
            <div class="flex justify-between text-slate-500 font-medium">
              <span>Connexions</span>
              <span class="font-bold text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded-md">312</span>
            </div>
          </div>
        </div>
      </div>

    </aside>

    <main class="flex flex-col gap-4" aria-label="News feed">

      <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-xs">
        <div class="flex items-center gap-3">
          <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-50 font-semibold text-xs text-blue-600 shadow-xs">AS</div>
          <input class="w-full flex-1 rounded-full border border-slate-200 bg-slate-50/60 px-4 py-2.5 text-xs text-slate-700 font-medium placeholder-slate-400 outline-none transition-all focus:border-blue-400 focus:bg-white focus:shadow-xs" placeholder="Partagez une publication, une idée…" onclick="this.blur()" />
        </div>

        <div class="mt-3 flex flex-wrap gap-1 border-t border-slate-100 pt-2.5">
          <button class="flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-emerald-50 hover:text-emerald-600 cursor-pointer">
            <i class="ti ti-photo text-base text-emerald-500" aria-hidden="true"></i> Photo
          </button>
          <button class="flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-sky-50 hover:text-sky-600 cursor-pointer">
            <i class="ti ti-video text-base text-sky-500" aria-hidden="true"></i> Vidéo
          </button>
          <button class="flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-amber-50 hover:text-amber-600 cursor-pointer">
            <i class="ti ti-file-text text-base text-amber-500" aria-hidden="true"></i> Article
          </button>
          <button class="flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-purple-50 hover:text-purple-600 cursor-pointer">
            <i class="ti ti-calendar-event text-base text-purple-500" aria-hidden="true"></i> Événement
          </button>
        </div>
      </div>

    @yield('content')


    </main>


    <aside class="hidden flex-col gap-4 lg:flex" aria-label="Suggestions and trends">

      <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-xs">
        <p class="text-xs font-bold tracking-wide text-slate-900 mb-3.5">Personnes à contacter</p>

        <div class="space-y-3.5">
          <div class="flex items-center gap-2.5">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-50 font-semibold text-xs text-blue-600">IA</div>
            <div class="flex-1 min-w-0">
              <p class="truncate text-xs font-semibold text-slate-900">Imane Alami</p>
              <p class="truncate text-[10px] font-medium text-slate-400 mt-0.5">Dev React · Rabat</p>
            </div>
            <button class="rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-bold text-slate-800 transition-all hover:bg-slate-50 hover:border-slate-300 active:scale-95 cursor-pointer whitespace-nowrap"><i class="ti ti-plus" aria-hidden="true"></i></button>
          </div>

          <div class="flex items-center gap-2.5">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-50 font-semibold text-xs text-emerald-600">MO</div>
            <div class="flex-1 min-w-0">
              <p class="truncate text-xs font-semibold text-slate-900">Mehdi Ouali</p>
              <p class="truncate text-[10px] font-medium text-slate-400 mt-0.5">DevOps · Docker</p>
            </div>
            <button class="rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-bold text-slate-800 transition-all hover:bg-slate-50 hover:border-slate-300 active:scale-95 cursor-pointer whitespace-nowrap"><i class="ti ti-plus" aria-hidden="true"></i></button>
          </div>

          <div class="flex items-center gap-2.5">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-rose-50 font-semibold text-xs text-rose-600">LS</div>
            <div class="flex-1 min-w-0">
              <p class="truncate text-xs font-semibold text-slate-900">Lina Sqalli</p>
              <p class="truncate text-[10px] font-medium text-slate-400 mt-0.5">PM · Agile · Scrum</p>
            </div>
            <button class="rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-bold text-slate-800 transition-all hover:bg-slate-50 hover:border-slate-300 active:scale-95 cursor-pointer whitespace-nowrap"><i class="ti ti-plus" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>

      </div>

    @include('layouts.footer')
    </aside>

  </div>

</body>
</html>
