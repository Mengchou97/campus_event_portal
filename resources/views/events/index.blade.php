@extends('layouts.app')

@section('content')
<div class="row">
@forelse ($events as $event)
    <div class="col-md-4 mb-3"><div class="card h-100"><div class="card-body">
        <h2 class="h5">{{ $event->title }}</h2>
        <p>{{ Str::limit($event->description, 120) }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Starts at:</strong> {{ $event->starts_at }}</p>
        <p><strong>Ends at:</strong> {{ $event->ends_at }}</p>
        <p><strong>Organizer:</strong> {{ $event->organizer->name }}</p>
        <a href="{{ route('events.show', $event) }}" class="btn btn-primary">View event</a>
    </div></div></div>
@empty
    <p>No published events yet.</p>
@endforelse
</div>
{{ $events->links() }}
@endsection
