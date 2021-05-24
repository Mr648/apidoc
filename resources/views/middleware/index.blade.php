@extends('layouts.app')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title my-0">Middlewares<span
                    class="badge badge-dark badge-pill">{{count($middlewares)}}</span></h4>
        </div>
        <div class="card-body">
            @if(count($middlewares)!=0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Previous</th>
                        <th scope="col">Next</th>
                        <th scope="col">Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($middlewares as $middleware)
                        <tr>
                            <th scope="row">{{$middleware->id}}</th>
                            <td>{{$middleware->name}}</td>
                            <td>{{$middleware->previous}}</td>
                            <td>{{$middleware->next}}</td>
                            <td>{{$middleware->created_at->format('Y-m-d H:i:s')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="card-title">No Middlewares</h4>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{route('middlewares.create')}}" target="_blank"
               class="btn btn-outline-info rounded-pill">Add Middlewares</a>
        </div>
    </div>


@endsection
