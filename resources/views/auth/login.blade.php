<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ECDO | Log in</title>

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/skin-blue.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.min.css') }}">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="login-page">

<div class="login-box">

    <div class="login-logo">
        <a href="../../index2.html"><b>ECDO</b>Org</a>
    </div><!-- end of login lgo -->

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'has-error is-invalid' : '' }}" placeholder="@lang('site.email')" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="error invalid-feedback" style="color :red">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="error invalid-feedback" style="color :red">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label style="font-weight: normal;"><input type="checkbox" name="remember"> @lang('site.remember_me')</label>
                @error('remember')
                    <span class="error invalid-feedback" style="color :red">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.login')</button>

        </form><!-- end of form -->

    </div><!-- end of login body -->

</div><!-- end of login-box -->

{{--<!-- jQuery 3 -->--}}
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('admin/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('admin/js/fastclick.js') }}"></script>

</body>
</html>
