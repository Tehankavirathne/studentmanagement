@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">course Page</div>
    <div class="card-body">
            <h5 class="card-title">Name : {{ $course->name }}</h5>
            <p class="card-text">syllabus : {{ $course->syllabus }}</p>
            <p class="card-text">duration : {{ $course->duration() }}</p>
        <hr>
    </div>
</div>

@endsection
