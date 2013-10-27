@extends('layouts.default')

@section('content')

    <div class="row">
         <h3 class="page-title"></h3>
      
          <a class="btn btn-add-resource" href="{{{ URL::to('resources/add') }}}"><span class="glyphicon glyphicon-plus"></span> Add Resource</a>
        
    </div>

    <div class="row">
                <div class="col-md-3">
                    <h4 class="resource-title">Beginner</h4>
                    @foreach($beginner_resources as $resource)
                        <p><a href="{{ $resource->resource_url }}">{{ $resource->resource_title}}</a></p>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <h4 class="resource-title">Intermediate</h4>
                    @foreach($inter_resources as $resource)
                    <p><a href="{{ $resource->resource_url }}">{{ $resource->resource_title}}</a></p>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <h4 class="resource-title">Advanced</h4>
                    @foreach($advanced_resources as $resource)
                    <p><a href="{{ $resource->resource_url }}">{{ $resource->resource_title}}</a></p>
                    @endforeach
                </div>


    </div>

@stop