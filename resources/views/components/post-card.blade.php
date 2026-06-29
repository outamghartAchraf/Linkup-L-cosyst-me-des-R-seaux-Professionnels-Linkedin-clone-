    <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition-all hover:shadow-md hover:shadow-slate-200/40">
        <div class="flex items-start gap-3 mb-3">
          <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-100/70 font-semibold text-sm text-blue-700 ring-2 ring-blue-50">{{ substr($post->user->name, 0, 2) }}</div>
          <div class="flex-1">
            <p class="text-sm font-semibold text-slate-900">{{ $post->user->name }}</p>
            <p class="text-xs font-medium text-slate-400 mt-0.5 leading-normal">{{ $post->user->headline }}</p>
            <p class="mt-1 flex items-center gap-1 text-[10px] font-medium text-slate-400"><i class="ti ti-clock text-xs" aria-hidden="true"></i> {{ $post->created_at->diffForHumans() }}</p>
          </div>
          <button class="rounded-full p-1 text-slate-400 hover:bg-slate-50 hover:text-slate-600 transition-all cursor-pointer" aria-label="More options"><i class="ti ti-dots text-lg" aria-hidden="true"></i></button>
        </div>

        <p class="text-xs leading-relaxed text-slate-700 font-normal mb-4">
            {{ $post->content }}
        </p>

        {{-- <div class="flex items-center justify-between border-b border-slate-100 pb-2.5 text-[11px] font-medium text-slate-400">
          <div class="flex items-center gap-2">
            <div class="flex items-center -space-x-1.5">
              <span class="flex h-5 w-5 items-center justify-center rounded-full bg-blue-500 text-[10px] text-white ring-2 ring-white">👍</span>
              <span class="flex h-5 w-5 items-center justify-center rounded-full bg-rose-500 text-[10px] text-white ring-2 ring-white">❤️</span>
              <span class="flex h-5 w-5 items-center justify-center rounded-full bg-amber-500 text-[10px] text-white ring-2 ring-white">👏</span>
            </div>
            <span>Sophia L. et <strong class="font-semibold text-slate-700">47 autres</strong></span>
          </div>
          <span class="hover:text-blue-600 hover:underline cursor-pointer">12 commentaires</span>
        </div> --}}

        <div class="mt-2 flex gap-1">
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-thumb-up text-base" aria-hidden="true"></i> J'aime</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-message-circle text-base" aria-hidden="true"></i> Commenter</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-repeat text-base" aria-hidden="true"></i> Partager</button>
          <button class="flex-1 flex items-center justify-center gap-2 rounded-xl py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-slate-50 hover:text-blue-600 cursor-pointer"><i class="ti ti-send text-base" aria-hidden="true"></i> Envoyer</button>
        </div>
      </article>
