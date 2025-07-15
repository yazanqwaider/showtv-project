@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <h4>Random Shows</h4>

            <div class="d-flex gap-4">
                @foreach ($random_shows as $random_show)
                    <a href="{{ route('shows.show', ['show' => $random_show->id]) }}" class="episode-box">
                        <img src="{{ $random_show->episodes->first()?->full_thumbnail_url }}">
                        <h5 class="p-2">{{ $random_show->title }}</h5>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
