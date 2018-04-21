@extends('layouts.app')
@section('title') Home :: @parent @endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 suggestion-column">
            <h3>{{ $expense->title }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            
            <div class="row">
                
                <div class="col-xs-12 suggestion-column">
                    <h3>Description: </h3>
                    {!!$expense->description!!}
                </div>
                <div class="col-xs-12 suggestion-column">
                    <h3>Monthly Amount: </h3>
                    {!!$expense->amount!!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <a href="{{ url('expense/'.Auth::user()->id). '/' .$type. '/'. $expense->id. '/edit' }}" class="btn btn-login">
            Edit Expense
        </a>

    </div>

@endsection