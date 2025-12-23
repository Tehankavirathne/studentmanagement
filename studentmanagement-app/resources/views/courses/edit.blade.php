@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Edit student</div>
    <div class="card-body">
        <form action="{{ url('courses/' . $course->id) }}" method="POST">
            {!! csrf_field() !!}
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $course->id }}" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{ $course->name }}" class="form-control"></br>
            <label>syllabus</label></br>
            <input type="text" name="syllabus" id="syllabus" value="{{ $course->syllabus }}" class="form-control"></br>
            <label>duration</label></br>
            <input type="text" name="duration" id="duration" value="{{ $course->duration }}" class="form-control"></br>
            <button type="submit" class="btn btn-success">Update</button></br>
        </form>
    </div>
</div>

@endsection