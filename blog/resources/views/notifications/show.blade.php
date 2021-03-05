@extends('layouts.app')

@section('content')
    <div class="container">

        user notifications here: <br>
        <ul>
            @forelse($notifications as $notification)
                <li>
                    @if ($notification->type === 'App\Notifications\PaymentReceived')
                        we have received payment from you: {{ $notification->data['amount'] ?? 'undefined' }}
                    @endif
                </li>
            @empty
                you have no unread notifications
            @endforelse
        </ul>
    </div>
@endsection