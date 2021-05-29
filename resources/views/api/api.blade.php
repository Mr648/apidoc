@php($code = unique_code(5))
<div class="card mt-2 border-info">
    <div class="card-header">
        <ul class="nav nav-justified nav-tabs">
            <li class="nav-item">
                <a class="nav-link  btn btn-outline-dark active" id="pills-home-tab"
                   data-toggle="pill" href="#pills-home-{{$code}}" role="tab"
                   aria-controls="pills-home" aria-selected="true">Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-dark" id="pills-author-tab"
                   data-toggle="pill" href="#pills-author-{{$code}}" role="tab"
                   aria-controls="pills-author" aria-selected="false">Author</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-dark" id="pills-author-tab"
                   data-toggle="pill" href="#pills-extra-{{$code}}" role="tab"
                   aria-controls="pills-author" aria-selected="false">Extra</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-info" href="{{route('apis.show', ['api'=>$api->id])}}"
                   target="_blank">Show</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home-{{$code}}" role="tabpanel"
                 aria-labelledby="pills-home-tab">
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
                    <p class="{{$api->style}}">{{ucfirst($api->type)}}</p></div>
                <div class="card-text"><strong>Body:</strong>
                    <p>{{ucfirst($api->body)}}</p></div>
            </div>
            <div class="tab-pane fade text-center" id="pills-author-{{$code}}" role="tabpanel"
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
            <div class="tab-pane fade" id="pills-extra-{{$code}}" role="tabpanel" aria-labelledby="pills-extra-tab">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Params:
                        <a href="{{route('apis.params.create', ['api'=>$api->id])}}" target="_blank"
                           class="btn rounded-pill btn-outline-info"><i class="bi bi-plus-circle"></i> Add Params</a>
                        <span class="btn btn-dark rounded-pill">{{$api->params_count}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Headers:
                        <a href="{{route('apis.headers.create', ['api'=>$api->id])}}" target="_blank"
                           class="btn rounded-pill btn-outline-info"><i class="bi bi-plus-circle"></i> Add Headers</a>
                        <span class="btn btn-danger rounded-pill">{{$api->headers_count}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Queries:
                        <a href="{{route('apis.queries.create', ['api'=>$api->id])}}" target="_blank"
                           class="btn rounded-pill btn-outline-info"><i class="bi bi-plus-circle"></i> Add Queries</a>
                        <span class="btn btn-warning rounded-pill">{{$api->queries_count}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Responses:
                        <a href="{{route('apis.responses.create', ['api'=>$api->id])}}" target="_blank"
                           class="btn rounded-pill btn-outline-info"><i class="bi bi-plus-circle"></i> Add Responses</a>
                        <span class="btn btn-success rounded-pill">{{$api->responses_count}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Middlewares:
                        <a href="{{route('apis.middlewares.bind', ['api'=>$api->id])}}" target="_blank"
                           class="btn rounded-pill btn-outline-info"><i class="bi bi-plus-circle"></i> Add
                            Middlewares</a>
                        <span class="btn btn-warning rounded-pill">{{$api->middlewares_count}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <span class="text-dark">Since Version {{$api->version}}, <span
                class="text-info">Documented  {{$api->created_at->format('Y-m-d H:i:s')}}</span></span>
    </div>
</div>

