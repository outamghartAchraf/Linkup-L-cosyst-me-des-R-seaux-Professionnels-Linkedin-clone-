@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">

        <div class="h-44 bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700"></div>

        <div class="px-6 pb-6">

            <div class="-mt-16 flex flex-col gap-5 md:flex-row md:items-end md:justify-between">

                <div class="flex items-end gap-4">

                    <div class="flex h-32 w-32 items-center justify-center rounded-full border-4 border-white bg-blue-100 text-3xl font-bold text-blue-700 shadow">
                        @if ($user->image_url)
                            <img src="{{ asset('storage/' . $user->image_url) }}"
                                class="w-32 h-32 rounded-full object-cover border-4 border-white shadow">
                        @else
                            <div class="flex h-32 w-32 items-center justify-center rounded-full bg-blue-100 text-3xl font-bold text-blue-700 border-4 border-white">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col gap-0.5 pb-1">

                        <h1 class="text-xl font-bold text-slate-900 leading-snug">
                            {{ $user->name }}
                        </h1>

                        <p class="text-xs font-medium text-slate-500">
                            {{ $user->headline ?? 'No headline yet' }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ $user->company ?? 'No company' }}
                        </p>

                    </div>

                </div>

                <div>

                    <a href="{{ route('profile.edit') }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-blue-600 px-5 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-600 hover:text-white">

                        <i class="ti ti-edit"></i>

                        Edit Profile

                    </a>

                </div>

            </div>

            <div class="mt-8 grid grid-cols-3 gap-4">

                <div class="rounded-xl bg-slate-50 p-4 text-center">

                    <p class="text-xl font-bold text-slate-900">
                        {{ $posts->count() }}
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Posts
                    </p>

                </div>

                <div class="rounded-xl bg-slate-50 p-4 text-center">

                    <p class="text-xl font-bold text-slate-900">
                        0
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Connections
                    </p>

                </div>

                <div class="rounded-xl bg-slate-50 p-4 text-center">

                    <p class="text-xl font-bold text-slate-900">
                        @if ($user->followers()->count() > 0)
                            {{ $user->followers()->count() }}
                        @else
                            0
                        @endif
                      
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Followers
                    </p>

                </div>

            </div>

        </div>

    </div>

    <div class="mt-5">

        <h2 class="mb-4 text-sm font-bold text-slate-700">
            Activity
        </h2>

        @forelse($posts as $post)
            @include('components.post-card', ['post' => $post])

        @empty

            <div class="rounded-2xl border border-slate-200 bg-white p-10 text-center">

                <i class="ti ti-news text-5xl text-slate-300"></i>

                <h3 class="mt-4 text-sm font-semibold text-slate-700">
                    No posts yet
                </h3>

                <p class="mt-2 text-xs text-slate-400">
                    Publish your first post to start sharing with your network.
                </p>

            </div>
        @endforelse

    </div>

@endsection
