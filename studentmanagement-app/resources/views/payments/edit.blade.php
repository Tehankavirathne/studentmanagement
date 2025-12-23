@extends('layout')
@section('content')

<div class="card">
    <div class="card-header"> Edit Payment</div>
    <div class="card-body">
        <form action="{{ url('/payments/' . $payment->id) }}" method="POST">
            {!! csrf_field() !!}
            @method('PATCH')
            <div class="form-group">
                <label>Enrollment No</label></br>
            <input type="hidden" name="id" value="{{ $payment->id }}" />
            <select name="enrollment_id" id="enrollment_id" class="form-control">
                @foreach($enrollments as $id => $enroll_no)
                    <option value="{{ $id }}" {{ $payment->enrollment_id == $id ? 'selected' : '' }}>{{ $enroll_no }}</option>
                @endforeach
            </select></br>
            <label>Paid Date</label></br>
            <input type="text" name="paid_date" id="paid_date" value="{{ $payment->paid_date }}" class="form-control"></br>
            <label>Amount</label></br>
            <input type="text" name="amount" id="amount" value="{{ $payment->amount }}" class="form-control"></br>
            
            <button type="submit" class="btn btn-success">Update</button></br>
        </form>
    </div>
</div>

@endsection