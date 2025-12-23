@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Edit Teacher</div>
    <div class="card-body">
        <form action="{{ url('teachers/' . $teacher->id) }}" method="POST">
            {!! csrf_field() !!}
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $teacher->id }}" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{ $teacher->name }}" class="form-control"></br>
            <label>Address</label></br>
            <input type="text" name="address" id="address" value="{{ $teacher->address }}" class="form-control"></br>
            <label>Mobile</label></br>
            <input type="text" name="mobile" id="mobile" value="{{ $teacher->mobile }}" class="form-control"></br>
             <label>Age</label></br>
            <input type="text" name="age" id="age" value="{{ $teacher->age }}" class="form-control"></br>
            <button type="submit" class="btn btn-success">Update</button></br>
        </form>
    </div>
</div>

@endsection