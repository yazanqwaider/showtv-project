@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <div class="d-flex justify-content-between">
                <div>
                    <h2>{{ $show->title }}</h2>

                    <p>{{ $show->description }}</p>
                </div>

                <div>
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
    <script>
        const show = @json($show);

        $(() => {
            alert('test');
            $('#toggleShowFollowing').on('click', function() {

                $.post(`/user-show-following/${show.id}`, {}, function(response, status) {
                    if (status === "success") {

                    } else {
                        alert('Something went wrong !');
                    }
                });

            });
        });
    </script>
@endpush
