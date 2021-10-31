@if (current_user()->isNot($user))
    <form method="POST" action="/profiles/{{ $user->id }}/follow">
        @csrf
        <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs ml-4">
            {{ current_user()->isFollowing($user) ? 'Unfollow me' : 'Follow me' }}
        </button>
    </form>
@endif