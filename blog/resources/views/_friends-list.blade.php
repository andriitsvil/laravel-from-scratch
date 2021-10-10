<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @foreach(auth()->user()->follows as $user)
        <li class="mb-4">
            <div>
                <a href="{{ $user->path() }}" class="flex items-center text-sm">
                <img src="{{ $user->avatar()  }}"
                     alt="friend avatar"
                     class="rounded-full mr-2" style="width:40px;height:40px">
                {{ $user->name }}
                </a>
            </div>
        </li>
    @endforeach
</ul>