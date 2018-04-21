@extends('layouts.app')
{{-- Web site Title --}}
@section('title')
	@parent
@endsection

@section('content')
    <div class="row">
        <div class="page-header col-xs-12">
            <h2>Create New Expense</h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row login-row">
            {!! Form::open(array('url' => 'expense/'.$user_id. '/'. $type.'/store'))  !!}

            <div class="form-group  {{ $errors->has('title') ? 'has-error' : '' }}">
                {!! Form::label('title', 'Expense Title', array('class' => 'control-label')) !!}
                
                <div class="controls">
                     <input type="text" class="form-control" id="title" name="title">
                    <span class="help-block">{{ $errors->first('title', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }}">
                {!! Form::label('description', 'Description', array('class' => 'control-label')) !!}
                <div class="controls">
                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                    <span class="help-block">{{ $errors->first('description', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('amount') ? 'has-error' : '' }}">
                {!! Form::label('amount', 'Amount', array('class' => 'control-label')) !!}
                <div class="controls">
                    <input type="number" class="form-control" id="amount" name="amount">

                    <span class="help-block">{{ $errors->first('amount', ':message') }}</span>
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
