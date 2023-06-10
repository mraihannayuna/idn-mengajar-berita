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
@section ('title', 'login') @section ('content')

<div class="welcome text-center my-4">
  <h2 class="fw-bold">Welcome!</h2>
  <p class="fw-light">Login untuk melanjutkan ke Blogku</p>
</div>
<div class="card mb-4">
  <h4 class="text-center mb-4 fw-bold">Login</h4>
  <form method="POST" action="{{route('login')}}">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label fw-light">Email Address</label>
      <input
        type="email"
        name="email"
        class="form-control"
        id="email"
        required
      />
      @if ($errors->has('email'))
      <small class="text-danger">{{$errors->first('email')}}</small>
      @endif
    </div>
    <div class="mb-3">
      <label for="password" class="form-label fw-light">Password</label>
      <input
        type="password"
        name="password"
        class="form-control"
        id="password"
        required
      />
    </div>
    <div class="button d-flex justify-content-center">
      <button type="submit" name="submit" class="btn btn-primary btn-block">
        Login
      </button>
    </div>
    <div class="sign-opt my-2 text-center">
      <p class="text-secondary">
        don't have any account?<a
          href=" {{route('register')}}"
          class="mx-1 text-primary"
          >Sign Up</a
        >
      </p>
    </div>
  </form>
</div>

@endsection
