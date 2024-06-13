<?php
function daysPassed($targetDate) {
    $today = new DateTime();
    $today->setTime(0, 0);

    $target = new DateTime($targetDate);
    $target->setTime(0, 0);

    $interval = $today->diff($target);

    $passedDay = $interval->days > 0 ? $interval->days . ' days ago' : 'Today';

    return $passedDay;
}
?>
@extends('layout.layout')

@section('content')

    <form action="/" method="GET">
    @csrf
        <div class="row align-items-center">
            <div class="col-4">
                <div class="m-0 form-group">
                    <label for="description">Job Description</label>
                    <div class="d-flex">
                        <input name="title" type="text" class="form-control" id="description" value="{{ request('title') }}">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="m-0 form-group">
                    <label for="location">Location</label>
                    <div class="d-flex">
                        <input name="location" type="text" class="form-control" id="location" value="{{ request('location') }}">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="full_time" id="full_time">
                    <label class="form-check-label" for="full_time">
                        Full Time Only
                    </label>
                </div>
            </div>
            <div class="col-2">
                <button type="submit" class="ml-4 btn btn-primary w-75">Search</button>
            </div>
        </div>
    </form>

    <div class="mt-4 d-flex justify-content-between">
        <h2>Job List</h2>
        <a href="/add-job">
            <button type="button" class="btn btn-primary">Add Job</button>
        </a>
    </div>
    <div class="dropdown-divider"></div>
    <div class="mt-4">
        @forelse ($jobs as $key => $item)
        <div class="d-flex justify-content-between">
            <div>
                <a href="/{{$item -> id}}">
                    <h5 class="text-primary">{{$item -> title}}</h5>
                </a>
                <p><span class="text-secondary">{{$item -> company}}</span> - <span class="text-success">{{$item -> type === 1 ? 'Full Time' : 'Contract'}}</span></p>
            </div>
            <div>
                <p class="mb-1 text-end">{{$item -> location}}</p>
                <p class="text-secondary text-right">{{daysPassed($item -> created_at)}}</p>
            </div>
        </div>
        <div class="dropdown-divider"></div>
        @empty
        <div></div>
        @endforelse
        {{ $jobs -> links() }}
    </div>
    <script>
        var urlParams = new URLSearchParams(window.location.search);
        var full_time = urlParams.get('full_time');
        document.getElementById('full_time').checked = full_time === 'on' ? true : false;
    </script>
@endsection