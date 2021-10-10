@extends('components.app')

@section('content')
    <header class="mb-6" style="position:relative;">
        <img src="{{ asset('images/default-profile-banner.jpg') }}" alt="def" class="mb-4">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-2">{{ $user->name }}</h2>
                <p class="text-sm">Joined at {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div>
                <a href="#" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs">Edit profile</a>
                <a href="#" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs ml-4">Follow me</a>
            </div>
        </div>
        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur eos, iure odit quae quis recusandae repellat vel. Cupiditate deleniti incidunt, iste iusto labore nam odit reprehenderit repudiandae suscipit tenetur ullam.
        </p>
        <img
                src="{{ $user->avatar() }}"
                alt=""
                class="rounded-full"
                style="width:150px;height:150px;position:absolute;left:calc(50% - 75px);top:56%;"
        >
    </header>
    @include('_timeline', ['tweets' => $user->tweets])
@endsection