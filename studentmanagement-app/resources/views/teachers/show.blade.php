@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Teachers Page</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-title">Name : {{ $teacher->name }}</h5>
            <p class="card-text">Address : {{ $teacher->address }}</p>
            <p class="card-text">Mobile : {{ $teacher->mobile }}</p>
           
        </div>
        <hr>
    </div>
</div>

@endsection
