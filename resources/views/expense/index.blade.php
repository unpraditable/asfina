@extends('layouts.app')
@section('title') Home :: @parent @endsection
@section('content')
<div class="row suggestions-header {{$type}}-background ">
    <div class="page-header col-xs-12">
        <h4 class="text-center">Total {{$type}} : </h4>
        <h2 class="text-center">{{number_format( $sumExpenses , 0 , '.' , ',' )}}</h2>
        <h4 class="text-center">Remaining Allocation: {{number_format( $remainingAllocation , 0 , '.' , ',' )}}</h4>
    </div>
</div>

<div class="row">
    <div class=" col-xs-6 column-suggestions">
       <a href="{{ url('expense/'.Auth::user()->id). '/' .$type}}" type="submit" class="{{$type}}-background btn btn-login">
            Expenses
        </a> 
    </div>
    <div class="col-xs-6 column-suggestions">
       <a href="{{ url('expense/'.Auth::user()->id). '/' .$type. '/suggestions' }}" type="submit" class="{{$type}}-background btn btn-login">
            Suggestions
        </a> 
    </div>
</div>




    @if(count($expenses)>0)
    <div class="row">
        @foreach($expenses as $item)
        <div class="suggestions-row">
            <div class="col-xs-8">
                <p>{{ $item->title }}</p>
            </div>
            <div class="col-xs-3">
                <p>{{number_format( $item->amount , 0 , '.' , ',' )}}  </p>
            </div>
            <div class="col-xs-1">
                <a class="suggestion-link" href="{{ url('expense/'.Auth::user()->id). '/' .$type. '/'. $item->id }}">></a>
            </div>
        </div>
            
        @endforeach
    </div>
    @endif
    <div class="col-xs-12">
        <a href="{{ url('expense/'.Auth::user()->id). '/' .$type. '/create' }}" type="submit" class="btn-add {{$type}}-background ">
            +
        </a>

    </div>
    <div class="col-xs-12">
        
    </div>

@endsection
<script src="{{ asset('js/suggestions.js') }}"></script>
