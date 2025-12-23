@extends('layout')
@section('content')

<div class="card">
    <div class="card-header"> Edit Batch</div>
    <div class="card-body">
        <form action="{{ url('/batches/' . $batch->id) }}" method="POST">
            {!! csrf_field() !!}
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $batch->id }}" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{ $batch->name }}" class="form-control"></br>
            <label>Course</label></br>
            <select name="course_id" id="course_id" value="{{ $batch->course->name }}" class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $batch->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select></br>
            <label>Start Date</label></br>
            <input type="text" name="start_date" id="start_date" value="{{ $batch->start_date }}" class="form-control"></br>
            <button type="submit" class="btn btn-success">Update</button></br>
        </form>
    </div>
</div>

@endsection