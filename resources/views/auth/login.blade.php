@extends('layouts.guest')
@section('content')
    <div class="card col-md-3">
        <div class="login-logo">
            <a href="{{ route('home') }}"><b>Campus</b> Portal</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control" placeholder="Email" required autofocus
                            autocomplete="email">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control"
                            placeholder="Password" required autocomplete="current-password">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-7">
                            <div class="form-check">
                                <input type="checkbox" name="remember" value="1"
                                    class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </div>
                </form>
                @if (Route::has('password.request'))
                    <p class="mb-1 mt-3">
                        <a href="{{ route('password.request') }}">I forgot my password</a>
                    </p>
                @endif
                @if (Route::has('register'))
                    <p class="mb-0">
                        <a href="{{ route('register') }}">Register a new membership</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
    </div>

@endsection
