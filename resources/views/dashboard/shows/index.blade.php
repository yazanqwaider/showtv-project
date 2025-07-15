@extends('dashboard.layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-between my-2">
            <h4>Shows</h4>

            <a href="{{ route('dashboard.shows.create')}}" class="btn btn-success">Create New Show</a>
        </div>

        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Expisodes Count</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($shows as $show)
                    <tr>
                        <td>{{ $show->id }}</td>
                        <td>{{ $show->title }}</td>
                        <td>{{ $show->description }}</td>
                        <td>{{ $show->type }}</td>
                        <td>{{ $show->episodes_count }}</td>
                        <td>
                            <a href="{{ route('dashboard.shows.edit', ['show' => $show->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $shows->links() !!}
    </div>
@endsection
