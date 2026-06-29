    <aside class="flex flex-col gap-4" aria-label="User profile">

      <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white text-center shadow-xs transition-all hover:shadow-md hover:shadow-slate-200/50">
        <div class="h-16 bg-gradient-to-r from-blue-700 to-slate-800"></div>
        <div class="-mt-8 mx-auto mb-3 flex h-16 w-16 items-center justify-center rounded-full border-1 border-white bg-gradient-to-tr from-blue-500 to-indigo-600 font-semibold text-xl text-white shadow-sm">
        @auth



            @if(auth()->user()->image_url)

<img
    src="{{ asset('storage/'.auth()->user()->image_url) }}"
    class="h-16 w-16 rounded-full object-cover border-4 border-white">

@else

<div class="h-16 w-16 rounded-full bg-blue-500 text-white flex items-center justify-center">
    {{ strtoupper(substr(auth()->user()->name,0,2)) }}
</div>

@endif
       @endauth
        </div>
        <div class="px-5 pb-5">
          <p class="font-semibold text-slate-900 text-base">@if (auth()->user())
            {{ Auth::user()->name }}
          @endif</p>
 
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
