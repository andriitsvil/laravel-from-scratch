<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
    @foreach(auth()->user()->follows as $user)
        <li class="mb-4">
            <div class="flex items-center text-sm">
                <img src="{{ $user->avatar()  }}"
                     alt="friend avatar"
                     class="rounded-full mr-2" style="width:40px;height:40px">
                {{ $user->name }}
            </div>
        </li>
    @endforeach
</ul>