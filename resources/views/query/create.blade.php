@extends('controls.form')
@section('inputs')
    @include('controls.input' , ['input'=>'api', 'type'=>'number', 'attrs'=>'readonly', 'default'=>$api])
    @include('controls.input' , ['input'=>'name'])
    @include('controls.input' , ['input'=>'key'])
    @include('controls.selection'
        ,[
            'input'=>'type',
            'title'=>'Data type',
            'items'=>[
                'integer'=>'integer',
                'float'=>'float',
                'multi-value'=>'multi-value',
                'string'=>'string',
                'urlencoded'=>'urlencoded',
                'b64-url-safe-encoded'=>'b64-url-safe-encoded'
            ]
        ]
    )
    @include('controls.switch' , ['input'=>'required', 'text'=>'Required'])
    @include('controls.input' , ['input'=>'example'])
    @include('controls.textarea' , ['input'=>'description'])
    @include('controls.submit',['text'=>'Create!'])
@endsection
