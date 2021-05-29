@extends('controls.form')
@section('inputs')
    @include('controls.input' , ['input'=>'route', 'default'=>'/api/'])
    @include('controls.input' , ['input'=>'name'])
    @include('controls.input' , ['input'=>'version', 'default'=>'v1.0' , 'style'=>'bg-info text-light border-dark'])
    @include('controls.input' , ['input'=>'scope', 'default'=>'api' , 'style'=>'bg-info text-light border-dark'])
    @include('controls.selection'
        ,[
            'input'=>'type',
            'title'=>'Http method',
            'items'=>[
                'GET'=>'GET',
                'POST'=>'POST',
                'PUT'=>'PUT',
                'PATCH'=>'PATCH',
                'DELETE'=>'DELETE',
                'ANY'=>'ANY',
            ]
        ]
    )
    @include('controls.selection'
        ,[
            'input'=>'body',
            'title'=>'Body type',
            'items'=>[
                'no-body'=>'no-body',
                'application/json'=>'application/json',
                'application/xml'=>'application/xml',
                'form-url-encoded'=>'form-url-encoded',
                'multipart-form'=>'multipart-form',
            ]
        ]
    )
    @include('controls.textarea' ,['input'=>'description', 'default'=>'', 'rows'=>17] )
    @include('controls.submit',['text'=>'Create!'])
@endsection
