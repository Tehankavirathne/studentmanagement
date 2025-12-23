@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Payment</div>
    <div class="card-body">
        <form action="{{ url('payments') }}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="enrollment_id">Enrollment No</label>
                <select name="enrollment_id" id="enrollment_id" class="form-control" required>
                    <option value="">Select Enrollment No</option>
                    @foreach($enrollments as $id => $enroll_no)
                        <option value="{{ $id }}">{{ $enroll_no }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="paid_date">Paid Date</label>
                <input type="date" name="paid_date" id="paid_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
</div>
@endsection