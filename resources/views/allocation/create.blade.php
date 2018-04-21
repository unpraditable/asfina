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
            {!! Form::open(array('url' => 'allocation/store'))  !!}

            <div class="form-group  {{ $errors->has('monthly_salary') ? 'has-error' : '' }}">
                {!! Form::label('productivity', 'Productivity', array('class' => 'control-label')) !!}
                <div class="controls">
                     <input type="number" class="form-control" id="productivity" name="productivity">
                    <span class="help-block">{{ $errors->first('productivity', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('investments') ? 'has-error' : '' }}">
                {!! Form::label('investments', 'Investments & Insurance', array('class' => 'control-label')) !!}
                <div class="controls">
                    <input type="number" class="form-control" id="investments" name="investments">
                    <span class="help-block">{{ $errors->first('investments', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('savings') ? 'has-error' : '' }}">
                {!! Form::label('savings', 'Savings', array('class' => 'control-label')) !!}
                <div class="controls">
                    <input type="number" class="form-control" id="savings" name="savings">

                    <span class="help-block">{{ $errors->first('savings', ':message') }}</span>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('charities') ? 'has-error' : '' }}">
                {!! Form::label('charities', 'Taxes / Charities / Other Expenses', array('class' => 'control-label')) !!}
                <div class="controls">
                    <input type="number" class="form-control" id="charities" name="charities"}>
                    <span class="help-block">{{ $errors->first('charities', ':message') }}</span>
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
