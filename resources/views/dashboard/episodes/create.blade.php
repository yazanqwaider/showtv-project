@extends('dashboard.layouts.app')

@section('content')
    <div class="w-75 mx-auto">
        <h4>Create New Episode</h4>

        <div>
            <form action="{{ route('dashboard.episodes.store')}}" method="post" enctype="multipart/form-data">
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
                    <label for="show_id">Show</label>
                    <select name="show_id" id="show_id" class="form-control" required>
                        <option value="">Select show</option>

                        @foreach ($shows as $show)
                            <option value="{{ $show->id }}">{{ $show->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="duration">Duration</label>
                    <input type="number" name="duration" id="duration" class="form-control" placeholder="Duration" required>
                </div>

                <div class="form-group mt-2">
                    <label for="airing_dt">Date-Time</label>
                    <input type="datetime-local" name="airing_dt" id="airing_dt" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*" required>
                </div>

                <div class="form-group mt-2">
                    <label for="video">Video</label>
                    <input type="file" name="video" id="video" class="form-control" accept="video/*" required>
                </div>


                <div class="text-center mt-2">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
