@extends('dashboard.layouts.app')

@section('content')
    <div class="w-75 mx-auto">
        <h4>Update The Episode</h4>

        <div>
            <form action="{{ route('dashboard.episodes.update', ['episode' => $episode->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $episode->title }}" required>
                </div>

                <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Description" required>{{ $episode->description }}</textarea>
                </div>

                <div class="form-group mt-2">
                    <label for="show_id">Show</label>
                    <select name="show_id" id="show_id" class="form-control" required>
                        <option value="">Select show</option>

                        @foreach ($shows as $show)
                            <option value="{{ $show->id }}" @selected($episode->show_id == $show->id)>{{ $show->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="duration">Duration</label>
                    <input type="number" name="duration" id="duration" class="form-control" placeholder="Duration" value="{{ $episode->duration }}" required>
                </div>

                <div class="form-group mt-2">
                    <label for="airing_dt">Date-Time</label>
                    <input type="datetime-local" name="airing_dt" id="airing_dt" class="form-control" value="{{ $episode->airing_dt }}" required>
                </div>

                <div class="form-group mt-2">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*">

                    @if ($episode->thumbnail_url)
                        <img src="{{ url('storage/' . $episode->thumbnail_url) }}" width="100" height="100">
                    @endif
                </div>

                <div class="form-group mt-2">
                    <label for="video">Video</label>
                    <input type="file" name="video" id="video" class="form-control" accept="video/*">
                </div>


                <div class="text-center mt-2">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
