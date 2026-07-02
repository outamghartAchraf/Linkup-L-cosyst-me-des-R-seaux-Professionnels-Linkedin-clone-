@extends('layouts.app')

@section('title','Edit Profile')

@section('content')

<div class="rounded-2xl border border-slate-200 bg-white shadow-xs">


    <div class="border-b border-slate-200 px-6 py-5">

        <h1 class="text-lg font-bold text-slate-800">
            Edit Profile
        </h1>

        <p class="mt-1 text-xs text-slate-400">
            Update your professional information.
        </p>

    </div>

    <form action="{{ route('profile.update') }}" method="POST" class="p-6"   enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="space-y-6">

            <div>

    <label class="block mb-2 text-xs font-semibold text-slate-700">
        Profile Photo
    </label>

    @if($user->image_url)

        <img
            src="{{ asset('storage/'.$user->image_url) }}"
            class="w-24 h-24 rounded-full object-cover mb-3 border">

    @endif

    <input
        type="file"
        name="image"
        accept="image/*"
        class="block w-full rounded-xl border border-slate-300 p-3 text-xs">

    @error('image')
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    @enderror

</div>

            <div>

                <label class="mb-2 block text-xs font-semibold text-slate-700">
                    Full Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name',$user->name) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-xs outline-none focus:border-blue-500">

                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror

            </div>

            <div>

                <label class="mb-2 block text-xs font-semibold text-slate-700">
                    Headline
                </label>

                <input
                    type="text"
                    name="headline"
                    value="{{ old('headline',$user->headline) }}"
                    placeholder="Full Stack Developer"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-xs outline-none focus:border-blue-500">

                @error('headline')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror

            </div>

            <div>

                <label class="mb-2 block text-xs font-semibold text-slate-700">
                    Company
                </label>

                <input
                    type="text"
                    name="company"
                    value="{{ old('company',$user->company) }}"
                    placeholder="Company"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-xs outline-none focus:border-blue-500">

                @error('company')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror

            </div>



        <div class="mt-8 flex justify-end gap-3">

            <a
                href="{{ route('profile') }}"
                class="rounded-xl border border-slate-300 px-5 py-3 text-xs font-semibold text-slate-700 hover:bg-slate-100">

                Cancel

            </a>

            <button
                type="submit"
                class="rounded-xl bg-blue-600 px-6 py-3 text-xs font-semibold text-white hover:bg-blue-700">

                Save Changes

            </button>

        </div>

    </form>

</div>

@endsection
