<div class="card mt-4">
    <div class="card-header">
        <h4 class="card-title">Headers <span class="badge badge-dark badge-pill">{{count($params)}}</span></h4>
    </div>
    <div class="card-body">
        @if(count($params)!=0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($params as $param)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }}</th>
                            <td>{{$param->name}}</td>
                            <td>{{$param->value}}</td>
                            <td>{{$param->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4 class="card-title">No headers</h4>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{route('apis.headers.create', ['api'=>$api->id])}}" target="_blank"
           class="btn btn-outline-info rounded-pill">Add Header</a>
    </div>
</div>

