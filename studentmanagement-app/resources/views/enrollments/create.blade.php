@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Enrollment page</div>
    <div class="card-body">
        <form action="{{ url('enrollments') }}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="enroll_no">Enrollment No</label>
                <input type="text" name="enroll_no" id="enroll_no" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="batch_id">Batch</label>
                <select name="batch_id" id="batch_id" class="form-control" required>
                    <option value="">Select Batch</option>
                    @foreach($batches as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="student_id">Student</label>
                <select name="student_id" id="student_id" class="form-control" required>
                    <option value="">Select Student</option>
                    @foreach($students as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="join_date">Join Date</label>
                <input type="date" name="join_date" id="join_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fee">Fee</label>
                <input type="number" name="fee" id="fee" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
</div>
@endsection