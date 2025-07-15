@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <div class="d-flex">
                <img src="{{ $episode->full_thumbnail_url }}" width="250">

                <div class="p-3">
                    <h2>{{ $episode->title }}</h2>

                    <p>{{ $episode->description }}</p>
                </div>
            </div>

            <div class="text-center">
                <video width="500" height="240" controls>
                    <source src="{{ $episode->full_video_url }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
@endsection
