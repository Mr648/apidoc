@extends('controls.form')
@section('inputs')
    @include('controls.input' , ['input'=>'api', 'type'=>'number', 'attrs'=>'readonly', 'default'=>$api])
    @include('controls.selection'
        ,[
            'input'=>'parent',
            'title'=>'Parent Parameter',
            'items'=>$params??[]
        ]
    )
    @include('controls.input' , ['input'=>'name'])
    @include('controls.input' , ['input'=>'rules'])
    @include('controls.input' , ['input'=>'example'])
    @include('controls.input' , ['input'=>'description'])
    @include('controls.submit',['text'=>'Create!'])
@endsection
