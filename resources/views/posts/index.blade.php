@extends('layouts.app')

@section('content')
      <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition-all hover:shadow-md hover:shadow-slate-200/40">
        <div class="flex items-start gap-3 mb-3">
          <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-100/70 font-semibold text-sm text-blue-700 ring-2 ring-blue-50">KM</div>
          <div class="flex-1">
            <p class="text-sm font-semibold text-slate-900">Khadija Makkaouia</p>
            <p class="text-xs font-medium text-slate-400 mt-0.5 leading-normal">Lead Développeuse · Architecte logicielle · Laravel & Vue.js</p>
            <p class="mt-1 flex items-center gap-1 text-[10px] font-medium text-slate-400"><i class="ti ti-clock text-xs" aria-hidden="true"></i> Il y a 2 heures</p>
          </div>
          <button class="rounded-full p-1 text-slate-400 hover:bg-slate-50 hover:text-slate-600 transition-all cursor-pointer" aria-label="More options"><i class="ti ti-dots text-lg" aria-hidden="true"></i></button>
        </div>

        <span class="inline-block rounded-lg bg-blue-50 px-2.5 py-0.5 text-[10px] font-bold text-blue-600 uppercase tracking-wider mb-2">#Laravel</span>

        <p class="text-xs leading-relaxed text-slate-700 font-normal mb-4">
          Lancement du projet <strong class="font-semibold text-slate-900">LinkUp</strong> — notre clone LinkedIn full-stack ! Cette semaine, on pose les fondations : migrations Eloquent, relations <code class="rounded bg-slate-100 px-1.5 py-0.5 font-mono text-[11px] font-medium text-rose-600">hasMany</code>, et le fil d'actualité. Architecture pensée pour scaler dès le départ. 🚀
        </p>

        <div class="flex items-center justify-between border-b border-slate-100 pb-2.5 text-[11px] font-medium text-slate-400">
          <div class="flex items-center gap-2">
            <div class="flex items-center -space-x-1.5">
              <span class="flex h-5 w-5 items-center justify-center rounded-full bg-blue-500 text-[10px] text-white ring-2 ring-white">👍</span>
              <span class="flex h-5 w-5 items-center justify-center rounded-full bg-rose-500 text-[10px] text-white ring-2 ring-white">❤️</span>
              <span class="flex h-5 w-5 items-center justify-center rounded-full bg-amber-500 text-[10px] text-white ring-2 ring-white">👏</span>
            </div>
            <span>Sophia L. et <strong class="font-semibold text-slate-700">47 autres</strong></span>
          </div>
          <span class="hover:text-blue-600 hover:underline cursor-pointer">12 commentaires</span>
        </div>

        <div class="mt-2 flex gap-1">
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-thumb-up text-base" aria-hidden="true"></i> J'aime</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-message-circle text-base" aria-hidden="true"></i> Commenter</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-repeat text-base" aria-hidden="true"></i> Partager</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-send text-base" aria-hidden="true"></i> Envoyer</button>
        </div>
      </article>

      <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition-all hover:shadow-md hover:shadow-slate-200/40">
        <div class="flex items-start gap-3 mb-3">
          <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-teal-50 font-semibold text-sm text-teal-700 ring-2 ring-teal-50">YB</div>
          <div class="flex-1">
            <p class="text-sm font-semibold text-slate-900">Youssef Benali</p>
            <p class="text-xs font-medium text-slate-400 mt-0.5 leading-normal">Développeur Backend · PHP · MySQL · Casablanca</p>
            <p class="mt-1 flex items-center gap-1 text-[10px] font-medium text-slate-400"><i class="ti ti-clock text-xs" aria-hidden="true"></i> Il y a 5 heures</p>
          </div>
          <button class="rounded-full p-1 text-slate-400 hover:bg-slate-50 hover:text-slate-600 transition-all cursor-pointer" aria-label="More options"><i class="ti ti-dots text-lg" aria-hidden="true"></i></button>
        </div>

        <p class="text-xs leading-relaxed text-slate-700 font-normal mb-3">
          Après 3 ans sur Symfony, j'ai migré mes projets vers <strong class="font-semibold text-slate-900">Laravel 12</strong>. La courbe d'apprentissage est douce, Eloquent est un plaisir, et l'écosystème (Livewire, Inertia) est impressionnant. Retour d'expérience complet en commentaires 👇
        </p>

        <div class="group rounded-xl border border-slate-100 bg-slate-50/50 p-3.5 transition-all hover:bg-slate-50 border-l-4 border-l-blue-500 mb-4 cursor-pointer">
          <div class="text-xs font-semibold text-slate-900 group-hover:text-blue-600 transition-colors">Symfony → Laravel : Ce qui change vraiment</div>
          <div class="mt-1 text-[11px] font-medium text-slate-400">Article · 8 min de lecture</div>
        </div>

        <div class="flex items-center justify-between border-b border-slate-100 pb-2.5 text-[11px] font-medium text-slate-400">
          <div class="flex items-center gap-2">
            <div class="flex items-center -space-x-1.5">
              <span class="flex h-5 w-5 items-center justify-center rounded-full bg-blue-500 text-[10px] text-white ring-2 ring-white">👍</span>
              <span class="flex h-5 w-5 items-center justify-center rounded-full bg-rose-500 text-[10px] text-white ring-2 ring-white">❤️</span>
            </div>
            <span><strong class="font-semibold text-slate-700">23 réactions</strong></span>
          </div>
          <span class="hover:text-blue-600 hover:underline cursor-pointer">5 commentaires</span>
        </div>

        <div class="mt-2 flex gap-1">
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-thumb-up text-base" aria-hidden="true"></i> J'aime</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-message-circle text-base" aria-hidden="true"></i> Commenter</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-repeat text-base" aria-hidden="true"></i> Partager</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-send text-base" aria-hidden="true"></i> Envoyer</button>
        </div>
      </article>


@endsection
