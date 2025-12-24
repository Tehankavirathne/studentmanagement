@extends('layout')

@section('content')
<div class="card mt-4">
  <div class="card-body">
    <h3 class="card-title mb-3">Register</h3>
    <form method="POST" action="{{ route('register.post') }}">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
      </div>
      <div class="mb-3">
        <label for="admin_code" class="form-label">Admin code (optional)</label>
        <input id="admin_code" type="text" class="form-control @error('admin_code') is-invalid @enderror" name="admin_code" value="{{ old('admin_code') }}">
        <div class="form-text">Provide a secret admin code to register as an administrator.</div>
        @error('admin_code')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</div>
@endsection
