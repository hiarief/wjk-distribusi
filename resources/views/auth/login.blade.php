@extends('layouts.siode.app-login')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">

        {!! csrf_field() !!}
        <p class="login-box-msg">Sistem Operasi Desa</p>

        @include('layouts.partials.messages')

        {{--  <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username"
                required>

            @if ($errors->has('username'))
                <label for="floatingName">Email or Username</label>
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
            <span class="fas fa-envelope"></span>   
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password"
                required>

            @if ($errors->has('password'))
                <label for="floatingPassword">Password</label>
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>  --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                placeholder="Username or Email" required="required" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>

            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password"
                required="required">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>

            <div class="col-4">
                <button type="submit" class="btn bg-gradient-warning btn-block">Login</button>
            </div>

            {{--  @include('auth.partials.copy')  --}}
        </div>

        {{--  <div class="social-auth-links mt-2 mb-3 text-center">
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div>

        <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p>  --}}

    </form>
@endsection
