@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <div class="d-flex">
                <img src="{{ $episode->full_thumbnail_url }}" width="250">

                <div class="p-3 col">
                    <div class="d-flex justify-content-between">
                        <h2>{{ $episode->title }}</h2>

                        <div class="col-1">
                            <button class="btn btn-{{ $is_liked ? 'danger' : 'success' }}" id="toggleEpisodeLike"
                                @disabled(!auth()->check())>
                                {{ $is_liked ? 'DisLike' : 'Like' }}
                            </button>
                        </div>
                    </div>

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

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        const episode = @json($episode);
        const csrf = @json(csrf_token());

        $(() => {
            $('#toggleEpisodeLike').on('click', function() {
                $.post(`/user-episode-like/${episode.id}`, {'_token': csrf}, function(response, status) {
                    if (status === "success") {
                        $('#toggleEpisodeLike')
                            .text(response.is_attached ? 'DisLike' : 'Like')
                            .toggleClass('btn-danger btn-success');
                    } else {
                        alert('Something went wrong !');
                    }
                });
            });
        });
    </script>
@endpush