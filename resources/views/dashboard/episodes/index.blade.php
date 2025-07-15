@extends('dashboard.layouts.app')

@section('content')
    <div class="">
        <h4>Episodes</h4>

        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Show</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Duration</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $episodes->links() !!}
    </div>
@endsection
