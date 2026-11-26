      <aside class="hidden flex-col gap-4 lg:flex" aria-label="Suggestions and trends">

            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-xs">
                <p class="text-xs font-bold tracking-wide text-slate-900 mb-3.5">Personnes à contacter</p>

                <div class="space-y-3.5">
                    @forelse ($suggestedUsers as $suggestedUser)
                        <div class="flex items-center gap-2.5">
                            @if ($suggestedUser->avatar_url)
                                <img src="{{ $suggestedUser->avatar_url }}" alt="{{ $suggestedUser->name }}"
                                    class="h-9 w-9 shrink-0 rounded-full object-cover" loading="lazy" decoding="async">
                            @else
                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-50 font-semibold text-xs text-blue-600">
                                    {{ strtoupper(substr($suggestedUser->name, 0, 2)) }}
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="truncate text-xs font-semibold text-slate-900">{{ $suggestedUser->name }}</p>
                                <p class="truncate text-[10px] font-medium text-slate-400 mt-0.5">
                                    {{ $suggestedUser->headline ?: ($suggestedUser->company ?: 'Professional Member') }}
                                </p>
                            </div>
                            <form action="{{ route('users.follow', $suggestedUser) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-bold text-slate-800 transition-all hover:bg-slate-50 hover:border-slate-300">
                                    <i class="ti ti-plus" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400">No suggestions right now.</p>
                    @endforelse
                </div>
            </div>

    </aside>
