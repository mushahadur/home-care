@extends('backend.layouts.app')


@section('title', 'Notifications')

@section('content')
<div class="container">
    <h1>নোটিফিকেশন</h1>
    @if (auth()->user()->unreadNotifications->count() > 0)
        <div class="alert alert-info">
            আপনার কাছে {{ auth()->user()->unreadNotifications->count() }}টি নতুন নোটিফিকেশন আছে।
        </div>
    @endif
    <ul class="list-group">
        @foreach (auth()->user()->notifications as $notification)
            <li class="list-group-item {{ $notification->unread() ? 'bg-light' : '' }}">
                {{ $notification->data['message'] }}
                <a href="{{ $notification->data['url'] }}" class="btn btn-sm btn-primary">দেখুন</a>
                @if ($notification->unread())
                    <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">পড়া হয়েছে</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection