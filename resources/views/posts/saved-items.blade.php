@extends('layouts.app')

@section('title', 'Saved Items')

@section('content')

<div class="mb-6 flex items-center justify-between">

    <div>

        <h1 class="text-xl font-bold text-slate-900">
            Saved Items
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Posts you saved to read later.
        </p>

    </div>

    <span
        class="rounded-full bg-blue-100 px-4 py-2 text-xs font-semibold text-blue-700">

        {{ $posts->count() }} Saved

    </span>

</div>

@forelse($posts as $post)

    @include('components.post-card', ['post' => $post])

@empty

<div class="rounded-2xl border border-slate-200 bg-white p-10 text-center">

    <i class="ti ti-bookmark text-6xl text-slate-300"></i>

    <h2 class="mt-4 text-lg font-semibold text-slate-700">

        No Saved Posts

    </h2>

    <p class="mt-2 text-sm text-slate-400">

        Save posts to read them later.

    </p>

    <a
        href="{{ route('feed') }}"
        class="mt-6 inline-flex items-center rounded-xl bg-blue-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

        Back to Feed

    </a>

</div>

@endforelse

@endsection
