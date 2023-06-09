@extends ('layouts.template')
<style>
  body {
    background-color: #f5f5f5;
  }

  .card {
    margin-top: 100px;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
    padding: 30px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
  }

  .form-control:focus {
    box-shadow: none;
    border-color: #4f92ff;
  }

  .btn-primary {
    background-color: #4f92ff;
    border-color: #4f92ff;
  }

  .btn-primary:hover {
    background-color: #2e71d1;
    border-color: #2e71d1;
  }
</style>
@section('title', 'Sign Up') @section('content')

<div class="card my-5">
  <h4 class="text-center">Sign Up</h4>
  <form method="POST" action="{{ route('auth.register') }}">
    @csrf
    <div class="mb-2">
      <label for="name" class="form-label fw-light">Full Name</label>
      <input
        type="text"
        name="name"
        class="form-control"
        id="name"
        value="{{ old('name') }}"
        required
      />
      @if($errors->has('name'))
      <span class="text-danger">{{$errors->first('name')}}</span>
      @endif
    </div>

    <div class="mb-2">
      <label for="email" class="form-label fw-light">Email Address</label>
      <input
        type="text"
        name="email"
        class="form-control"
        id="email"
        value="{{ old('email') }}"
        required
      />
      @if($errors->has('email'))
      <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div class="mb-2">
      <label for="password" class="form-label fw-light">Password</label>
      <input
        type="password"
        name="password"
        class="form-control"
        id="password"
      />
      @if($errors->has('password'))
      <span class="text-danger">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="mb-0">
      <label for="password_confirmation" class="form-label fw-light"
        >Confirm Password</label
      >
      <input
        type="password"
        name="password_confirmation"
        class="form-control"
        id="password_confirmation"
      />
      @if($errors->has('password_confirmation'))
      <span class="text-danger"
        >{{ $errors->first('password_confirmation') }}</span
      >
      @endif
    </div>

    <div class="button d-flex justify-content-center mt-2">
      <button
        type="submit"
        name="submit"
        class="btn btn-primary btn-block mt-4"
      >
        Sign Up
      </button>
    </div>
    <p class="sign-opt text-secondary text-center">
      already have account?<a
        href="{{ route('auth.login') }}"
        class="mx-1 text-primary"
        >Sign in</a
      >
    </p>
  </form>
</div>

@endsection
