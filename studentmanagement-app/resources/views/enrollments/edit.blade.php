@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Edit Enrollment</div>
    <div class="card-body">
        <form action="{{ url('enrollments/' . $enrollment->id) }}" method="POST">
            {!! csrf_field() !!}
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $enrollment->id }}" />
            <div class="form-group">
                <label>Enroll No</label>
                <input type="text" name="enroll_no" id="enroll_no" value="{{ $enrollment->enroll_no }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Batch</label>
                <select name="batch_id" id="batch_id" class="form-control" required>
                    @foreach($batches as $id => $name)
                        <option value="{{ $id }}" {{ $enrollment->batch_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Student</label>
                <select name="student_id" id="student_id" class="form-control" required>
                    @foreach($students as $id => $name)
                        <option value="{{ $id }}" {{ $enrollment->student_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Join Date</label>
                <input type="date" name="join_date" id="join_date" value="{{ $enrollment->join_date }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Fee</label>
                <input type="number" name="fee" id="fee" value="{{ $enrollment->fee }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
</div>

@endsection