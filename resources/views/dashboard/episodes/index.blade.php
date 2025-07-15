@extends('dashboard.layouts.app')

@section('content')
    <div class="">
        <div class="d-flex justify-content-between my-2">
            <h4>Episodes</h4>

            <a href="{{ route('dashboard.episodes.create')}}" class="btn btn-success">Create New Episode</a>
        </div>

        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Show</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($episodes as $episode)
                    <tr>
                        <td>{{ $episode->id }}</td>
                        <td>{{ $episode->show->title }}</td>
                        <td>{{ $episode->title }}</td>
                        <td>{{ $episode->description }}</td>
                        <td>{{ $episode->duration }}</td>
                        <td>
                            <a href="{{ route('dashboard.episodes.edit', ['episode' => $episode->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $episodes->links() !!}
    </div>
@endsection
