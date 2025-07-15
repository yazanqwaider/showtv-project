@extends('dashboard.layouts.app')

@push('style')
    <style>
        .home-box {
            width: 25%;
            display: inline-block;
            height: 112px;
            text-align: center;
            border: 1px solid #c4c4c4;
            border-radius: 11px;
            box-shadow: 0px 0px 10px #dbdbdb;
            line-height: 108px;
            text-decoration: none;
            color: black;
            background: #f4f4f4;
            font-size: 23px;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-evenly mt-5">
        <a href="{{ route('dashboard.users.index') }}" class="home-box">Users</a>

        <a href="{{ route('dashboard.shows.index') }}" class="home-box">Shows</a>

        <a href="{{ route('dashboard.episodes.index') }}" class="home-box">Episodes</a>
    </div>
@endsection
