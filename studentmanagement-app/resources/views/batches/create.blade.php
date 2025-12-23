@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Batch page</div>
    <div class="card-body">
        <form action="{{ url('batches') }}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">Batch Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="course_id">Course Name</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">Select Course</option>
                    @foreach($courses as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
</div>
@endsection