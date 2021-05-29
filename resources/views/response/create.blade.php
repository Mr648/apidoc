@extends('controls.form')
@section('inputs')
    @include('controls.input' , ['input'=>'api', 'type'=>'number', 'attrs'=>'readonly', 'default'=>$api])
    @include('controls.selection'
        ,[
            'input'=>'type',
            'title'=>'Content Type',
            'items'=>[
                'json'=>'json',
                'html'=>'html',
                'text'=>'text',
                'image'=>'image',
                'file'=>'file',
                'view'=>'view',
            ]
        ]
    )
    @include('controls.selection'
        ,[
            'input'=>'code',
            'title'=>'Response Code',
            'items'=>[
                '200'=>'HTTP_OK',
                '201'=>'HTTP_CREATED',
                '204'=>'HTTP_NO_CONTENT',
                '202'=>'HTTP_ACCEPTED',
                '400'=>'HTTP_BAD_REQUEST',
                '404'=>'HTTP_NOT_FOUND',
                '403'=>'HTTP_FORBIDDEN',
                '401'=>'HTTP_UNAUTHORIZED',
                '504'=>'HTTP_GATEWAY_TIMEOUT',
                '408'=>'HTTP_REQUEST_TIMEOUT',
                '303'=>'HTTP_SEE_OTHER',
                '503'=>'HTTP_SERVICE_UNAVAILABLE',
                '500'=>'HTTP_INTERNAL_SERVER_ERROR'
            ]
        ]
    )
    @include('controls.textarea' ,['input'=>'description', 'default'=>'همه نکات رعایت شده', 'rows'=>3] )
    @include('controls.textarea' ,['input'=>'request', 'default'=>'', 'rows'=>3] )
    @include('controls.textarea' ,['input'=>'sample', 'default'=>'', 'rows'=>3] )
    @include('controls.submit',['text'=>'Create!'])
@endsection












