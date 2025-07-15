@extends('layouts.app')

@push('style')
    <style>
        .episode-box {
            width: 16%;
            border-radius: 12px;
            overflow: hidden;
            background: #f7f7f7;
            box-shadow: 0px 0px 8px #979797;
        }

        .episode-box img {
            width: 100%;
            height: 200px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .episode-box:hover {
            transition: 0.5s;
            cursor: pointer;
            transform: scale(1.06)
        }
    </style>
@endpush

@section('content')
    <div class="p-3">
        <div>
            <h4>Latest Episodes</h4>

            <div class="d-flex gap-4">
                @foreach ($latest_episodes as $latest_episode)
                    <div class="episode-box">
                        <img src="{{ url('storage/' . $latest_episode->thumbnail_url) }}">
                        <h5 class="p-2">{{ $latest_episode->title }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
