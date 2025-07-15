@extends('dashboard.layouts.app')

@section('content')
    <div class="w-75 mx-auto">
        <h4>Create New Show</h4>

        <div>
            <form action="{{ route('dashboard.shows.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                </div>

                <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Description" required></textarea>
                </div>


                <div class="form-group mt-2">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">Select show type</option>

                        @foreach ($show_types as $show_type)
                            <option value="{{ $show_type->value }}">{{ $show_type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="description">Airing Time</label>

                    <div>
                        <label for="sat">Sat</label>
                        <input type="checkbox" name="airing_time[sat]" id="sat" value="1">
                    </div>

                    <div>
                        <label for="sun">Sun</label>
                        <input type="checkbox" name="airing_time[sun]" id="sun" value="1">
                    </div>

                    <div>
                        <label for="mon">Mon</label>
                        <input type="checkbox" name="airing_time[mon]" id="mon" value="1">
                    </div>

                    <div>
                        <label for="tue">Tue</label>
                        <input type="checkbox" name="airing_time[tue]" id="tue" value="1">
                    </div>

                    <div>
                        <label for="wed">Wed</label>
                        <input type="checkbox" name="airing_time[wed]" id="wed" value="1">
                    </div>

                    <div>
                        <label for="thu">Thu</label>
                        <input type="checkbox" name="airing_time[thu]" id="thu" value="1">
                    </div>

                    <div>
                        <label for="fri">Fri</label>
                        <input type="checkbox" name="airing_time[fri]" id="fri" value="1">
                    </div>
                </div>

                <div class="form-group mt-2 w-50">
                    <label for="time">Time</label>
                    <input type="time" name="time" id="time" class="form-control w-25">
                </div>

                <div class="text-center mt-2">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
