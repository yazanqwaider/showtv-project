@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <h4>Random Shows</h4>

            <div class="d-flex gap-4">
                @foreach ($random_shows as $random_show)
                    <div class="episode-box">
                        <img src="{{ url('storage/' . $random_show->thumbnail_url) }}">
                        <h5 class="p-2">{{ $random_show->title }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
