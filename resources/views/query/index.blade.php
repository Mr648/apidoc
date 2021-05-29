<div class="card mt-4">
    <div class="card-header">
        <h4 class="card-title my-0">Query Parameters <span class="badge badge-dark badge-pill">{{count($params)}}</span>
        </h4>
    </div>
    <div class="card-body">
        @if(count($params)!=0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Required</th>
                        <th scope="col">Type</th>
                        <th scope="col">Example</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($params as $param)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }}</th>
                            <td>{{$param->name}}</td>
                            <td>{{$param->description}}</td>
                            <td>{{$param->required}}</td>
                            <td>{{$param->type}}</td>
                            <td>{{$param->example}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4 class="card-title">No Query Parameters</h4>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{route('apis.queries.create', ['api'=>$api->id])}}" target="_blank"
           class="btn btn-outline-info rounded-pill">Add Query Parameters</a>
    </div>
</div>

