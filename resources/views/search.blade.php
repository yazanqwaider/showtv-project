@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div>
            <h4>Your search: {{ request()->search }}</h4>
            <h5>Results Count: {{ $results->count() }}</h5>

            <div class="d-flex gap-4">
                @foreach ($results as $result)
                    <div>
                        {{ $result->title }}
                    </div>
                @endforeach
            </div>

            {!! $results->links() !!}
        </div>
    </div>
@endsection
