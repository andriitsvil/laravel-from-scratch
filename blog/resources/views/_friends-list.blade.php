<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
    @foreach(range(1, 8) as $index)
        <li class="mb-4">
            <div class="flex items-center text-sm">
                <img src="images/default-avatar.jpeg"
                     alt="friend avatar"
                     class="rounded-full mr-2" style="width:40px;height:40px">
                John Doe
            </div>
        </li>
    @endforeach
</ul>