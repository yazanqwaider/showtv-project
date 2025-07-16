@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <div class="d-flex justify-content-between">
                <div>
                    <h2>{{ $show->title }}</h2>

                    <p>{{ $show->description }}</p>
                </div>

                <div class="col-1">
                    <button class="btn btn-{{ $is_followed ? 'danger' : 'success' }}" id="toggleShowFollowing"
                        @disabled(!auth()->check())>
                        {{ $is_followed ? 'UnFollow' : 'Follow' }}
                    </button>
                </div>
            </div>

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


@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        const show = @json($show);
        const csrf = @json(csrf_token());

        $(() => {
            $('#toggleShowFollowing').on('click', function() {
                $.post(`/user-show-following/${show.id}`, {'_token': csrf}, function(response, status) {
                    if (status === "success") {
                        $('#toggleShowFollowing')
                            .text(response.is_attached ? 'UnFollow' : 'Follow')
                            .toggleClass('btn-danger btn-success');
                    } else {
                        alert('Something went wrong !');
                    }
                });

            });
        });
    </script>
@endpush
