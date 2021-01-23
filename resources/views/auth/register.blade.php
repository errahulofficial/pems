@extends('auth/master') 
@section('content')
<style>
    .login-box,
    .register-box {
        width: 600px;
    }
    .invalid-feedback{
        position: absolute;
    font-size: 12px;
    }
    .invalid-feedback strong{
      font-weight: 400;
      color: red
    }
    .form-group {
    margin-bottom: 20px;
}
</style>
<div class="register-box">

    <div class="register-box-body">
        <div class="register-logo">
            <a href="{{ url('') }}"><b>PEMS REGISTER</b></a>
        </div>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}"
                        placeholder="First Name" required autofocus> @if ($errors->has('fname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fname') }}</strong>
                    </span> @endif
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}"
                    placeholder="Last Name" required autofocus> @if ($errors->has('lname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lname') }}</strong>
                </span> @endif
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"
                    placeholder="Phone" required autofocus> @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span> @endif
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}"
                    placeholder="City" required autofocus> @if ($errors->has('city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city') }}</strong>
                </span> @endif
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}"
                    placeholder="State" required autofocus> @if ($errors->has('state'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('state') }}</strong>
                </span> @endif
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="zip" type="text" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip" value="{{ old('zip') }}"
                    placeholder="Zip" required autofocus> @if ($errors->has('zip'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('zip') }}</strong>
                </span> @endif
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                    placeholder="Email" required> @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span> @endif
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                    placeholder="Password" required> @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span> @endif
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                    required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            </div>
          



                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        @if (Route::has('login'))
        <div class="row">
        <a class="btn btn-link" href="{{ route('login') }}">{{ __('Already have an account ?') }}</a> @endif
        </div>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection