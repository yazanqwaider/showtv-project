@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <h4>Your search: {{ request()->search }}</h4>
            <h5>Results Count: {{ $results->count() }}</h5>

            <div class="d-flex gap-4">
                @foreach ($results as $result)
                    <a href="{{ route('shows.show', ['show' => $result->id]) }}" class="episode-box">
                        <img src="{{ $result->episodes->first()?->full_thumbnail_url }}">
                        <h5 class="p-2">{{ $result->title }}</h5>
                    </a>
                @endforeach
            </div>

            {!! $results->links() !!}
        </div>
    </div>
@endsection
