<div class="card mt-4 bg-light">
    <div class="card-header">
        <h4 class="card-title">Responses <span class="badge badge-dark badge-pill">{{count($params)}}</span></h4>
    </div>
    <div class="card-body">
        @if(count($params)!=0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr aria-colcount="8">
                        <th>#</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Sample</th>
                        <th>Request</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($params as $param)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }}</th>
                            <td>{{$param->code}}</td>
                            <td>{{$param->type}}</td>
                            <td>{{$param->description}}</td>
                            <td class="justify-content-center">
                                <pre style="max-width: 400px !important;"><code>{{$param->sample}}</code></pre>
                            </td>
                            <td class="justify-content-center">
                                <pre style="max-width: 400px !important;"><code>{{$param->request}}</code></pre>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4 class="card-title">No responses</h4>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{route('apis.responses.create', ['api'=>$api->id])}}" target="_blank"
           class="btn btn-outline-info rounded-pill">Add Responses</a>
    </div>
</div>

<script>
    $(document).ready(function () {
        hljs.highlightAll();
    });
</script>
