@extends('layouts.app')
{{-- Web site Title --}}
@section('title')
	@parent
@endsection

@section('content')
    <div class="row">
        <div class="page-header col-xs-12">
            <h2>Allocations</h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row login-row">
            {!! Form::model($user, array('route' => array('profile.update', $user->id), 'method' => 'POST')) !!}

            <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name', 'Name', array('class' => 'control-label')) !!}
                <div class="controls">
                     <input type="text" class="form-control" id="name" name="name" value={{$user->name}}>
                    <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('email', 'email & Insurance', array('class' => 'control-label')) !!}
                <div class="controls">
                    <input type="email" class="form-control" id="email" name="email" value={{$user->email}}>
                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('monthly_salary') ? 'has-error' : '' }}">
                {!! Form::label('monthly_salary', 'Monthly Salary', array('class' => 'control-label')) !!}
                <div class="controls">
                    <input type="number" class="form-control" id="monthly_salary" name="monthly_salary" value={{$user->monthly_salary}}>

                    <span class="help-block">{{ $errors->first('monthly_salary', ':message') }}</span>
                </div>
            </div>
            
            
            <div class="form-group">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-login">
                        Save
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
