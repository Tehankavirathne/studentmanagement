@extends('layout')

@section('content')
<div class="card mt-4">
  <div class="card-body">
    <h3 class="card-title mb-3">Login</h3>
    <form method="POST" action="{{ route('login.post') }}">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
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
      <div class="mb-3 form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>
@endsection
