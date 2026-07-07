@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="rounded-2xl overflow-hidden border border-slate-200 bg-white shadow-xs">

    {{-- Cover --}}
    <div class="h-44 bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700"></div>

    <div class="px-8 pb-8">

        {{-- Avatar --}}
        <div class="-mt-16">

            @if($user->image_url)

                <img
                    src="{{ asset('storage/'.$user->image_url) }}"
                    alt="{{ $user->name }}"
                    class="h-32 w-32 rounded-full border-4 border-white object-cover shadow-lg">

            @else

                <div
                    class="flex h-32 w-32 items-center justify-center rounded-full border-4 border-white bg-blue-100 text-4xl font-bold text-blue-700 shadow-lg">

                    {{ strtoupper(substr($user->name,0,2)) }}

                </div>

            @endif

        </div>

        {{-- User Information --}}
        <div class="mt-5">

            <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">

                <div>

                    <h1 class="text-2xl font-bold text-slate-900">
                        {{ $user->name }}
                    </h1>

                    <p class="mt-2 text-sm text-slate-500">
                        {{ $user->headline ?: 'Professional Member' }}
                    </p>

                    @if($user->company)

                        <p class="mt-2 text-sm font-medium text-blue-600">
                            {{ $user->company }}
                        </p>

                    @endif

                    <p class="mt-2 text-xs text-slate-400">
                        Member since {{ $user->created_at->format('F Y') }}
                    </p>

                </div>

                @if(auth()->id() != $user->id)

                    <button
                        class="rounded-xl bg-blue-600 px-5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">

                        Connect

                    </button>

                @endif

            </div>

        </div>

        {{-- Statistics --}}
        <div class="mt-8 grid grid-cols-3 gap-4">

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 text-center">

                <p class="text-2xl font-bold text-slate-900">
                    {{ $user->posts->count() }}
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    Posts
                </p>

            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 text-center">

                <p class="text-2xl font-bold text-slate-900">
                    @if ($user->following()->count() > 0)
                        {{ $user->following()->count() }}
                    @else
                        0
                    @endif
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    following
                </p>

            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 text-center">

                <p class="text-2xl font-bold text-slate-900">
                    {{ $user->created_at->diffForHumans() }}
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    Joined
                </p>

            </div>

        </div>

    </div>

</div>

{{-- Posts --}}
<div class="mt-6">

    <h2 class="mb-4 text-lg font-semibold text-slate-800">
        Publications
    </h2>

    <div class="space-y-4">

        @forelse($user->posts()->latest()->get() as $post)

            @include('components.post-card', ['post' => $post])

        @empty

            <div class="rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-xs">

                <i class="ti ti-article text-5xl text-slate-300"></i>

                <p class="mt-4 text-sm font-medium text-slate-500">
                    No posts published yet.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection
