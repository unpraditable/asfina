@extends('layouts.app')
@section('title') Home :: @parent @endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 suggestion-column">
            <h1 class="centered">{!!$suggestion->title!!}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <img class="img-responsive img-suggestion centered" src="{{url('images/article/'.$suggestion->picture)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 suggestion-column">
                    {!!$suggestion->content!!}
                </div>
            </div>
        </div>
    </div>
        
    <div class="col-xs-12">
        <a href="{{ url($suggestion->source) }}" type="submit" class="btn btn-login" target="_blank">
            View Details
        </a>

    </div>

@endsection