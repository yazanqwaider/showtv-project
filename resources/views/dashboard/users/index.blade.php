@extends('dashboard.layouts.app')

@section('content')
    <div class="">
        <h4>Users</h4>

        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <img src="{{ $user->full_photo_url }}" width="100" height="100" class="rounded-circle">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $users->links() !!}
    </div>
@endsection
