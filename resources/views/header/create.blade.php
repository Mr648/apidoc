@extends('controls.form')
@section('inputs')
    @include('controls.input' , ['input'=>'api', 'type'=>'number', 'attrs'=>'readonly', 'default'=>$api])
    @include('controls.input' , ['input'=>'name'])
    @include('controls.input' , ['input'=>'value'])
    @include('controls.input' , ['input'=>'description'])
    @include('controls.submit',['text'=>'Create!'])
@endsection
