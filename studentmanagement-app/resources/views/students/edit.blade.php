@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Edit student</div>
    <div class="card-body">
        <form action="{{ url('students/' . $student->id) }}" method="POST">
            {!! csrf_field() !!}
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $student->id }}" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{ $student->name }}" class="form-control"></br>
            <label>Address</label></br>
            <input type="text" name="address" id="address" value="{{ $student->address }}" class="form-control"></br>
            <label>Mobile</label></br>
            <input type="text" name="mobile" id="mobile" value="{{ $student->mobile }}" class="form-control"></br>
            <label>Age</label></br>
            <input type="text" name="age" id="age" value="{{ $student->age }}" class="form-control"></br>
            <label>Course</label></br>
            <input type="text" name="course" id="course" value="{{ $student->course }}" class="form-control"></br>
           <button type="submit" class="btn btn-success">Update</button></br>
        </form>
    </div>
</div>

@endsection