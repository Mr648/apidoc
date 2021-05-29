<div class="card">
    <div class="card-header">
        <h4 class="card-title">Parameters <span class="badge badge-dark badge-pill">{{count($params)}}</span></h4>
    </div>
    <div class="card-body">
        @if(count($params)!=0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Rules</th>
                        <th scope="col">Example</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($params as $param)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }}</th>
                            <td>{{$param->name}}</td>
                            <td>{{$param->rules}}</td>
                            <td>{{$param->example}}</td>
                            <td>{{$param->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4 class="card-title">No Parameters</h4>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{route('apis.params.create', ['api'=>$api->id])}}" target="_blank"
           class="btn btn-outline-info rounded-pill">Add Parameters</a>
    </div>
</div>

