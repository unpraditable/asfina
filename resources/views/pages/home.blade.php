@extends('layouts.app')
@section('title') Home :: @parent @endsection
@section('content')
<div class="row">
    <div class="page-header col-xs-12">
        <h2><?php echo date('D, M j, Y'); ?></h2>
    </div>
</div>


    @if(count($allocation)>0)
        <div class="row">
<!--
            <div class="col-xs-12">
                <h2>News</h2>
            </div>
-->
            
            <canvas id="myChart" width="20%"></canvas>
            <div class="legend-container">
                <div class="legend-wrapper">
                    <div class="col-xs-2">
                        <div class="legend productivity-legend"></div>
                    </div>
                    <div class="col-xs-10">Productivity</div>
                </div>
                <div class="legend-wrapper">
                    <div class="col-xs-2">
                        <div class="legend investments-legend"></div>
                    </div>
                    <div class="col-xs-10">Insurance & Investments</div>
                </div>
                <div class="legend-wrapper">
                    <div class="col-xs-2">
                        <div class="legend savings-legend"></div>
                    </div>
                    <div class="col-xs-10">Savings</div>
                </div>
                <div class="legend-wrapper">
                    <div class="col-xs-2">
                        <div class="legend charity-legend"></div>
                    </div>
                    <div class="col-xs-10">Taxes/Charities/Other Expenses</div>
                </div>
            </div>
            
            
                <div class="col-xs-12">
                    <a href="{{ url('allocation/'.Auth::user()->id) }}" type="submit" class="btn btn-login">
                        Edit Allocations
                    </a>

                </div>
<!--
            @foreach ($articles as $post)
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>
                                <strong><a href="{{url('article/'.$post->slug.'')}}">{{
                                        $post->title }}</a></strong>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{url('news/'.$post->slug.'')}}" class="thumbnail"><img
                                        src="http://placehold.it/260x180" alt=""></a>
                        </div>
                        <div class="col-md-10">
                            <p>{!! $post->introduction !!}</p>

                            <p>
                                <a class="btn btn-mini btn-default"
                                   href="{{url('news/'.$post->slug.'')}}">Read more</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p></p>

                            <p>
                                <span class="glyphicon glyphicon-user"></span> by <span
                                        class="muted">{{ $post->author->name }}</span> | <span
                                        class="glyphicon glyphicon-calendar"></span> {{ $post->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
-->
        </div>
        @else
        <div class="col-xs-12">
            <a href="{{ url('allocation/create') }}" type="submit" class="btn btn-login">
                Create Allocations
            </a>

        </div>
    @endif

<!--
    @if(count($photoAlbums)>0)
        <div class="row">
            <h2>Photos</h2>
            @foreach($photoAlbums as $item)
                <div class="col-sm-3">
                    <div class="row">
                        <a href="{{url('photo/'.$item->id.'')}}"
                           class="hover-effect">
                            @if($item->album_image!="")
                                <img class="col-sm-12"
                                        src="{!! url('appfiles/photoalbum/'.$item->folder_id.'/'.$item->album_image) !!}">
                            @elseif($item->album_image_first!="")
                                <img class="col-sm-12"
                                     src="{!! url('appfiles/photoalbum/'.$item->folder_id.'/'.$item->album_image_first) !!}">
                            @else
                                <img class="col-sm-12" src="{!! url('appfiles/photoalbum/no_photo.png') !!}">
                            @endif
                        </a>
                        <div class=" col-sm-12">{{$item->name}}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
-->

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

<script src="{{ asset('js/piechart.js') }}"></script>


<script>
    var productivity = {{$allocation->productivity}};
    var investments = {{$allocation->investments}};
    var savings = {{$allocation->savings}};
    var charities = {{$allocation->charities}};
    
    var linkProductivity = "expense/"+{{$user_id}}+"/productivity";
    var linkInvestments = "expense/"+{{$user_id}}+"/investments";
    var linkSavings = "expense/"+{{$user_id}}+"/savings";
    var linkCharities = "expense/"+{{$user_id}}+"/charities";

</script>

