@extends('layouts.app')
@section('content')
    <form method="post" action="{{$route}}">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-success">
                        <b>{{ session('success.message') }}</b>&nbsp;
                        <a href="{{session('success.link')}}" class="alert-link">Show</a>
                    </div>
                @endif
                @csrf
                @yield('inputs')
            </div>
        </div>
    </form>
@endsection
