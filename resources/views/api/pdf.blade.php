<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{strtoupper($api->name)}}</title>
    <style>
        body {
            font-family: Vazir, vazir;
        }

        .border {
            border-radius: 3mm / 3mm;
            background-clip: border-box;
            padding: 0 8px !important;
        }

        .param {
            color: #fff !important;
            border: #4a148c 1px;
            background-color: #4a148c;
        }

        .green {
            color: #212121 !important;
            border: #aeea00 1px;
            background-color: #aeea00;
        }

        .dark {
            color: #000 !important;
            border: #ff8f00 1px;
            background-color: #ff8f00;
        }

        .red {
            color: #fff !important;
            border: #d50000 1px;
            background-color: #d50000;
        }

        .me {
            color: #000 !important;
            border: #00c853 1px;
            background-color: #00c853;
            font-weight: bold;
        }

        .link {
            color: #212121 !important;
            border: #75a7ff 1px;
            background-color: #75a7ff;
            font-weight: bold;
            padding-top: 6px !important;
            padding-bottom: 6px !important;
            user-select: all;
        }

        .link::selection {
            color: #fff !important;
            padding-top: 6px !important;
            padding-bottom: 6px !important;
        }

        .selection {
            user-select: all;
            -moz-user-select: all;
            -webkit-user-select: all;
        }
    </style>
</head>
<body>
<main>
    <div class="container">
        <div class="card mt-2 border-info">
            <div class="card-body">
                <section>
                    <h3 class="card-title"><strong>Name: </strong>{{($api->name)}}</h3>
                    <h4 class="card-title"><strong>Scope(namespace): </strong>{{ucfirst($api->scope)}}</h4>
                    <hr>
                    <div class="card-text"><strong>Link:</strong>
                        <kbd class="{{colorize(100)}}">{{ergol($api->route)}}</kbd>
                    </div>
                    <div class="card-text"><strong>Route:</strong>
                        <kbd class="{{colorize(200)}}">{{$api->route}}</kbd>
                    </div>
                    <hr>
                    <div class="card-text"><strong>Description:</strong>
                        <pre>{{$api->description}}</pre>
                    </div>
                    <div class="card-text"><strong>Type:</strong>
                        {{ucfirst($api->type)}}
                    </div>
                    <div class="card-text"><strong>Body:</strong>
                        <p>{{ucfirst($api->body)}}</p></div>
                </section>
                <section>
                    <div class="card-title">Author: <strong>{{$api->author->name}}</strong></div>
                    <div class="btn-group">
                        <kbd>Email: <span class="{{colorize(648)}}">{{$api->author->email}}</span></kbd>&nbsp;&nbsp;&nbsp;
                        <kbd>Mobile: <span class="{{colorize(648)}}">{{$api->author->mobile}}</span></kbd>
                    </div>
                    <div class="card-text"></div>
                </section>
                <section>
                    <div class="col-md-12">
                        <h3>Parameters</h3>
                        @foreach($api->params as $param)
                            <kbd>{{ $loop->index +1 }}</kbd><br>
                            <kbd><span>Name: </span><strong class="{{colorize(700)}}">{{$param->name}}</strong></kbd>
                            <br>
                            <kbd><span>Rules: </span>{{$param->rules}}</kbd><br>
                            <kbd><span>Example: </span>{{$param->example}}</kbd><br>
                            <kbd><span>Description: </span>{{$param->description}}</kbd><br>
                            <hr>
                        @endforeach
                    </div>
                </section>
                <section>
                    <div class="col-md-12">
                        <h3>Headers</h3>
                        @foreach($api->headers as $param)
                            <kbd>{{ $loop->index +1 }}</kbd><br>
                            <kbd><span>Name: </span>{{$param->name}}</kbd><br>
                            <kbd><span>Value: </span>{{$param->value}}</kbd><br>
                            <kbd><span>Description: </span>{{$param->description}}</kbd><br>
                            <hr>
                        @endforeach
                    </div>
                </section>
                <section>
                    <div class="col-md-12">
                        <h3>Queries</h3>
                        @foreach($api->queries as $param)
                            <kbd>{{ $loop->index +1 }}</kbd><br>
                            <kbd><span>Name: </span>{{$param->name}}</kbd><br>
                            <kbd><span>Description: </span>{{$param->description}}</kbd><br>
                            <kbd><span>Required: </span>{{$param->required}}</kbd><br>
                            <kbd><span>Type: </span>{{$param->type}}</kbd><br>
                            <kbd><span>Example: </span>{{$param->example}}</kbd><br>
                            <hr>
                        @endforeach
                    </div>
                </section>
                <section>
                    <div class="col-md-12">
                        <h3>Middlewares</h3>
                        @foreach($api->middlewares as $param)
                            <kbd>{{ $loop->index +1 }}</kbd><br>
                            <kbd><span>Name: </span>{{$param->name}}</kbd><br>
                            <kbd><span>Previous: </span>{{$param->previous}}</kbd><br>
                            <kbd><span>Next: </span>{{$param->next}}</kbd><br>
                            <hr>
                        @endforeach
                    </div>
                </section>
                <section>
                    <div class="col-md-12">
                        <h3>Responses</h3>
                        @foreach($api->responses as $param)
                            <kbd>{{ $loop->index +1 }}</kbd><br>
                            <kbd><span>Code: </span><span
                                    class="{{colorize($param->code)}}">{{$param->code}}</span></kbd><br>
                            <kbd><span>Type: </span>{{$param->type}}</kbd><br>
                            <kbd><span>Description: </span>{{$param->description}}</kbd><br>
                            <strong>Response</strong><br>
                            <pre style="max-width: 400px !important;" class="selection"><code>{{$param->sample}}</code></pre>
                            <strong>Request</strong><br>
                            <pre style="max-width: 400px !important;" class="selection"><code>{{$param->request}}</code></pre>
                            <hr>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="card-footer">
                <span class="text-dark">Since Version {{$api->version}},
                <span class="text-info">Documented  {{$api->created_at->format('Y-m-d H:i:s')}}</span></span>
            </div>
        </div>
    </div>
</main>
</body>
</html>
