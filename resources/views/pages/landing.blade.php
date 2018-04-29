@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('site/user.login') !!} :: @parent @endsection

{{-- Content --}}
@section('content')
    <div class="flex-container container-fluid white-body">
        <div class="row">
            <div class="page-header">
                <h1 class="text-centered copperplate">ASFINA</h1>
                <h2 class="text-centered copperplate">Understands You</h2>
            </div>
        </div>
        <div class="row">
            <div class="page-header">
                <img class="img-responsive img-asfina text-centered centered" src="{{ asset('img/asfina.png') }}">
            </div>
        </div>
        <div class="row top-25">
            <div class="col-xs-12">
                <a href="{{ url('/home') }}" type="submit" class="btn btn-login">
                    Start
                </a>

            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="{{ asset('js/home.js') }}"></script>

