@extends('controls.form')
@section('inputs')
    @include('controls.input' , ['input'=>'name'])
    @include('controls.input' , ['input'=>'previous'])
    @include('controls.input' , ['input'=>'next'])
    @include('controls.submit',['text'=>'Create!'])
@endsection
