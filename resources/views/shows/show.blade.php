@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <h2>{{ $show->title }}</h2>

            <p>{{ $show->description }}</p>


            <div>
                <h4>Episodes</h4>

                <div class="row gap-4">
                    @foreach ($show->episodes as $episode)
                        <a href="{{ route('episodes.show', ['episode' => $episode->id]) }}" class="episode-box">
                            <img src="{{ $episode->full_thumbnail_url }}">
                            <h5 class="p-2">{{ $episode->title }}</h5>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
