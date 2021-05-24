@extends('controls.form')
@section('inputs')
    @include('controls.input' , ['input'=>'api', 'type'=>'number', 'attrs'=>'readonly', 'default'=>$api])
    @include('controls.selection'
        ,[
            'input'=>'middleware',
            'title'=>'Middleware',
            'items'=>$params??[],
        ]
    )
    @include('controls.submit',['text'=>'Bind!'])
@endsection
