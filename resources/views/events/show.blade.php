@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ $event->title }}</h2>
            <p>{{ $event->description }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p><strong>Starts at:</strong> {{ $event->starts_at}}</p>
            <p><strong>Ends at:</strong> {{ $event->ends_at}}</p>

            @if($event->workshops->isNotEmpty())
                <h3>Workshops</h3>
                <ul>
                    @foreach($event->workshops as $workshop)
                        <li>{{ $workshop->title }} - {{ $workshop->starts_at }} to {{ $workshop->ends_at }}</li>
                    @endforeach
                </ul>
            @else
                <p>No workshops available for this event.</p>
            @endif
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
        </div>

    </div>
@endsection
