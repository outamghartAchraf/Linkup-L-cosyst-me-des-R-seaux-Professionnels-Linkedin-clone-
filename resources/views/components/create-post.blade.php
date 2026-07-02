 <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-xs">

     <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="flex items-start gap-3">
             @auth
                 @if (auth()->user()->image_url)
                     <img src="{{ Storage::url(auth()->user()->image_url) }}" alt="{{ auth()->user()->name }}"
                         class="h-9 w-9 shrink-0 rounded-full object-cover border border-slate-200 shadow-xs">
                 @else
                     <div
                         class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-50 font-semibold text-xs text-blue-600 shadow-xs">

                         {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}

                     </div>
                 @endif
             @endauth
             <div class="flex-1">

                 <textarea name="content" rows="3"
                     class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50/60 px-4 py-2.5 text-xs text-slate-700 font-medium placeholder-slate-400 outline-none transition-all focus:border-blue-400 focus:bg-white focus:shadow-xs"
                     placeholder="Partagez une publication, une idée…">{{ old('content') }}</textarea>

                 @error('content')
                     <p class="mt-1 text-xs text-red-500">
                         {{ $message }}
                     </p>
                 @enderror

             </div>

         </div>

         <div class="mt-3 flex flex-wrap items-center justify-between border-t border-slate-100 pt-2.5">

             <div class="flex flex-wrap gap-1">

                 {{-- <button type="button"
                     class="flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-emerald-50 hover:text-emerald-600">
                     <i class="ti ti-photo text-base text-emerald-500"></i>
                     Photo
                 </button> --}}

                 <div class="flex items-center gap-2">
                     <input type="file" name="image" id="image" class="hidden" accept="image/*">

                     <label for="image"
                         class="cursor-pointer flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-emerald-50 hover:text-emerald-600">
                         <i class="ti ti-photo text-base text-emerald-500"></i>
                         Photo
                     </label>
                 </div>

<div class="flex items-center gap-2">
    <input
        type="file"
        name="video"
        id="video"
        class="hidden"
        accept="video/mp4,video/webm,video/ogg,video/quicktime">

    <label
        for="video"
        class="cursor-pointer flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-sky-50 hover:text-sky-600">

        <i class="ti ti-video text-base text-sky-500"></i>
        Vidéo

    </label>
</div>
                 <button type="button"
                     class="flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-amber-50 hover:text-amber-600">
                     <i class="ti ti-file-text text-base text-amber-500"></i>
                     Article
                 </button>

                 <button type="button"
                     class="flex items-center gap-2 rounded-xl bg-transparent px-3 py-2 text-xs font-semibold text-slate-500 transition-all hover:bg-purple-50 hover:text-purple-600">
                     <i class="ti ti-calendar-event text-base text-purple-500"></i>
                     Événement
                 </button>

             </div>

    <button
    type="submit"
    class="flex items-center justify-center rounded-xl bg-blue-600 p-2.5 text-white transition-all hover:bg-blue-700">

    <i class="ti ti-send text-base"></i>

</button>

         </div>

     </form>

 </div>
