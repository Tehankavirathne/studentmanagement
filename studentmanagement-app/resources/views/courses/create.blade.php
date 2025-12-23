@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Course page</div>
    <div class="card-body">
        <form action="{{ url('courses') }}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="syllabus">syllabus</label>
                <input type="text" name="syllabus" id="syllabus" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="duration">duration</label>
                <input type="number" name="duration" id="duration" class="form-control" required>
            </div>  
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
</div>
@endsection