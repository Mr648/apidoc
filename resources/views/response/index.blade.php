<div class="card mt-4 bg-light">
    <div class="card-header">
        <h4 class="card-title">Responses <span class="badge badge-dark badge-pill">{{count($params)}}</span></h4>
    </div>
    <div class="card-body">
        @if(count($params)!=0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Type</th>
                    <th scope="col" colspan="3">Sample</th>
                </tr>
                </thead>
                <tbody>
                @foreach($params as $param)
                    <tr>
                        <th scope="row">{{$param->id}}</th>
                        <td>{{$param->code}}</td>
                        <td>{{$param->type}}</td>
                        <td>
                            <pre><code class="language-json">{{$param->sample}}</code></pre>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
