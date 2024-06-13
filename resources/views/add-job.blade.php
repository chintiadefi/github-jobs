@extends('layout.layout')

@section('content')
    <h2>Add Jobs</h2>
    <form action="/job" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Job title</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="company">Company</label>
            <input name="company" type="text" class="form-control" id="company">
        </div>
        <div class="form-group form-check">
            <input name="type" type="checkbox" class="form-check-input" id="full_time">
            <label class="form-check-label" for="full_time">Full time</label>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input name="location" type="text" class="form-control" id="location">
        </div>
        <div class="form-group">
            <label for="image">Company profile</label>
            <input name="img" type="text" class="form-control" id="image">
        </div>
        <div class="form-group">
            <label for="url">Company url</label>
            <input name="url" type="text" class="form-control" id="url">
        </div>
        <div class="form-group">
            <label for="apply">How to apply</label>
            <textarea name="apply" class="form-control" id="apply" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="tiny-mce">Description</label>
            <textarea id="tiny-mce" name="description"></textarea>
        </div>
        <button type="submit" class="mt-4 btn btn-primary">Submit</button>
    </form>
@endsection