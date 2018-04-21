@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('site/user.login') !!} :: @parent @endsection

{{-- Content --}}
@section('content')
    <div class="container-fluid white-body">
        <div class="row">
            <div class="page-header">
                <h2>Welcome!</h2>
            </div>
        </div>
        <div class="row login-row">
            {!! Form::open(array('url' => url('auth/login'), 'method' => 'post', 'files'=> true)) !!}
            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('email', "E-Mail Address", array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                {!! Form::label('password', "Password", array('class' => 'control-label')) !!}
                <div class="controls">
                    {!! Form::password('password', array('class' => 'form-control')) !!}
                    <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-login">
                            Login
                        </button>

                        <a href="{{ url('/password/email') }}">Forgot Your Password?</a>
                    </div>
                </div>
                
            </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ url('auth/register') }}" type="submit" class="btn btn-login">
                    Register
                </a>

            </div>
        </div>
    </div>
@endsection
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/home.js') }}"></script>

