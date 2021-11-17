<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @forelse(auth()->user()->follows as $user)
        <li class="{{ $loop->last ? '' : 'mb-4' }}">
            <div>
                <a href="{{ $user->path() }}" class="flex items-center text-sm">
                <img src="{{ $user->avatar  }}"
                     alt="friend avatar"
                     class="rounded-full mr-2" style="width:40px;height:40px">
                {{ $user->name }}
                </a>
            </div>
        </li>
    @empty
        <p class="p-4">No friends yet</p>
    @endforelse
</ul>
</div>