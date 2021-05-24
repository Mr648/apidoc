@extends('layouts.app')
@section('content')
    <div class="card mt-2 border-info">
        <div class="card-header">
            <ul class="nav nav-justified nav-tabs">
                @include('controls.navitem', ['input'=>'information'])
                @include('controls.navitem', ['input'=>'author'])
                @include('controls.navitem', ['input'=>'parameters'])
                @include('controls.navitem', ['input'=>'headers'])
                @include('controls.navitem', ['input'=>'queries'])
                @include('controls.navitem', ['input'=>'middlewares'])
                @include('controls.navitem', ['input'=>'responses'])
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-information" role="tabpanel"
                     aria-labelledby="pills-information-tab">
                    <h5 class="card-title"><strong>Name: </strong>{{ucfirst($api->name)}}</h5>
                    <h6 class="card-subtitle"><strong>Scope(namespace): </strong>{{ucfirst($api->scope)}}</h6>
                    <hr>
                    <div class="card-text"><strong>Link:</strong>
                        <a href="{{ergol($api->route)}}" class="btn btn-link" target="_blank">{{ergol($api->route)}}</a>
                    </div>
                    <hr>
                    <div class="card-text"><strong>Description:</strong>
                        <p>{{$api->description}}</p></div>
                    <div class="card-text"><strong>Type:</strong>
                        <p>{{ucfirst($api->type)}}</p></div>
                    <div class="card-text"><strong>Body:</strong>
                        <p>{{ucfirst($api->body)}}</p></div>
                </div>
                <div class="tab-pane fade text-center" id="pills-author" role="tabpanel"
                     aria-labelledby="pills-author-tab">
                    <div class="card-title">Author: <strong>{{$api->author->name}}</strong></div>
                    <div class="btn-group">
                        <a href="mailto:{{$api->author->email}}"
                           class="btn btn-outline-primary">Email: {{$api->author->email}}</a>
                        <a href="tel:{{$api->author->mobile}}"
                           class="btn btn-outline-danger">Mobile: {{$api->author->mobile}}</a>
                    </div>
                    <div class="card-text"></div>
                </div>
                <div class="tab-pane fade" id="pills-parameters" role="tabpanel" aria-labelledby="pills-parameters-tab">
                    <div class="row">
                        <div class="col-md-12">
                            @include('param.index', ['params'=>$api->params])
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-headers" role="tabpanel" aria-labelledby="pills-headers-tab">
                    <div class="row">
                        <div class="col-md-12">
                            @include('header.index', ['params'=>$api->headers])
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-queries" role="tabpanel"
                     aria-labelledby="pills-queries-tab">
                    <div class="row">
                        <div class="col-md-12">
                            @include('query.index', ['params'=>$api->queries])
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-middlewares" role="tabpanel"
                     aria-labelledby="pills-middlewares-tab">
                    <div class="row">
                        <div class="col-md-12">
                            @include('middleware.bound', ['params'=>$api->middlewares])
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-responses" role="tabpanel" aria-labelledby="pills-responses-tab">
                    <div class="row">
                        <div class="col-md-12">
                            @include('response.index', ['params'=>$api->responses])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
        <span class="text-dark">Since Version {{$api->version}},
            <span class="text-info">Documented  {{$api->created_at->format('Y-m-d H:i:s')}}</span></span>
        </div>
    </div>
@endsection
