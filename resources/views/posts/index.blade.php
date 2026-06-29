@extends('layouts.app')

@section('title', 'Feed')

@section('content')

    @include('components.create-post')

    @forelse($posts as $post)

        @include('components.post-card', ['post' => $post])

    @empty

        <div class="rounded-2xl border border-slate-200 bg-white p-8 text-center">
            <p class="text-sm text-slate-500">
                Aucun post disponible.
            </p>
        </div>

    @endforelse

@endsection
