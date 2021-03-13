@foreach ($conversation->replies as $reply)
    <div @if ($reply->isBest()) style="background-color:lightgreen;" @endif>
        <p class="m-0"><strong>{{$reply->user->name}} said...</strong></p>

        {{$reply->body}}
        @can ('update', $conversation)
            <form action="/best-replies/{{ $reply->id }}" method="POST">
                @csrf
                <button>Best reply?</button>
            </form>
        @endcan
    </div>

    @continue($loop->last)
    <hr>
@endforeach