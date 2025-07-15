@extends('layouts.app')

@section('content')
    <div class="py-3 px-5">
        <div>
            <h4>Latest Episodes</h4>

            <div class="row gap-4">
                @foreach ($latest_episodes as $latest_episode)
                    <a href="{{ route('episodes.show', ['episode' => $latest_episode->id]) }}" class="episode-box">
                        <img src="{{ $latest_episode->full_thumbnail_url }}">
                        <h5 class="p-2">{{ $latest_episode->title }}</h5>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
