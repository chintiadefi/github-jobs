@extends('layout.layout')

@section('content')
<div>
    <a href="/">Back</a>
</div>
<div class="mt-3 p-3 border rounded">
    <p class="mb-2 text-secondary">{{ $detail->type === 1 ? 'Full Time' : 'Contract' }} / {{ $detail->location }}</p>
    <h4 class="mb-3 text-primary">{{ $detail->title }}</h4>
    <div class="dropdown-divider"></div>
    <div class="mt-4 row justify-content-between">
        <div class="col">
            {!! $detail->description !!}
        </div>
        <div class="col-4 d-flex flex-column align-items-end">
            <div class="card border-dark mb-3 w-100">
                <div class="card-header">{{ $detail->company }}</div>
                <div class="card-body d-flex flex-column align-items-center">
                    <img src="{{ $detail->img }}" style="width: 250px; height: 300px; object-fit: contain;">
                    <a href="{{ $detail->url }}">{{ $detail->url }}</a>
                </div>
            </div>
            <div class="card border-dark mb-3 w-100">
                <div class="card-header">How to apply</div>
                <div class="card-body">
                    <p class="card-text">{{ $detail->apply }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection