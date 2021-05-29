@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><i class="bi bi-info-circle"></i></th>
                    <th><i class="bi bi-diagram-3"></i> Route</th>
                    <th><i class="bi bi-eye"></i> PDF</th>
                    <th><i class="bi bi-eye"></i> Json</th>
                    <th><i class="bi bi-eye"></i> Basic</th>
                    <th>Show</th>
                    <th><i class="bi bi-lightbulb"></i> Type</th>
                    <th>Body</th>
                    <th>Params</th>
                    <th>Headers</th>
                    <th>Queries</th>
                    <th>Responses</th>
                    <th>Middlewares</th>
                    <th><i class="bi bi-calendar-date"></i> Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $apis as $api)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{$api->route}}</td>
                        <td>
                            <a class="nav-link btn btn-outline-danger"
                               href="{{route('apis.pdf', ['api'=>$api->id])}}" target="_blank">PDF</a>
                        </td>
                        <td>
                            <a class="nav-link btn btn-outline-dark"
                               href="{{route('apis.json', ['api'=>$api->id])}}" target="_blank">Json</a>
                        </td>
                        <td>
                            <a class="nav-link btn btn-outline-info"
                               href="{{route('apis.simple', ['api'=>$api->id])}}" target="_blank">Basic</a>
                        </td>
                        <td><a href="{{route('apis.show', ['api'=>$api->id])}}" target="_blank"
                               class="btn btn-light rounded-pill"><i class="bi bi-three-dots-vertical"></i></a></td>
                        <td>{{ucfirst($api->type)}}</td>
                        <td>{{ucfirst($api->body)}}</td>
                        <td><span class="btn btn-dark rounded-pill">{{$api->params_count}}</span></td>
                        <td><span class="btn btn-primary rounded-pill">{{$api->headers_count}}</span></td>
                        <td><span class="btn btn-secondary rounded-pill">{{$api->queries_count}}</span></td>
                        <td><span class="btn btn-info rounded-pill">{{$api->responses_count}}</span></td>
                        <td><span class="btn btn-dark rounded-pill">{{$api->middlewares_count}}</span></td>
                        <td>{{$api->created_at->format('Y-m-d H:i:s')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
