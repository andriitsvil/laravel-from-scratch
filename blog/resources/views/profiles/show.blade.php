<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img src="{{ asset('images/default-profile-banner.jpg') }}" alt="def" class="mb-4">
            <img src="{{ $user->avatar }}" alt="" class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" width="150" style="left:50%;">
        </div>
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-2">{{ $user->name }}</h2>
                <p class="text-sm">Joined at {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs">Edit profile</a>
                @endcan
                <x-follow-button :user="$user">
                </x-follow-button>
            </div>
        </div>
        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur eos, iure odit quae quis recusandae
            repellat vel. Cupiditate deleniti incidunt, iste iusto labore nam odit reprehenderit repudiandae suscipit
            tenetur ullam.
        </p>

    </header>
    @include('_timeline', ['tweets' => $user->tweets])
</x-app>