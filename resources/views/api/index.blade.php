@extends('layouts.app')
@section('content')
    <div class="row">
        @foreach( $apis as $api)
            <div class="col-md-6">
                @include('api.api', ['api'=>$api])
            </div>
        @endforeach
    </div>
@endsection
