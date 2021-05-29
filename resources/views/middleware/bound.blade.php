<div class="card mt-4">
    <div class="card-header">
        <h4 class="card-title">Middlewares <span class="badge badge-dark badge-pill">{{count($params)}}</span></h4>
    </div>
    <div class="card-body">
        @if(count($params)!=0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Previous</th>
                        <th scope="col">Name</th>
                        <th scope="col">Next</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($params as $param)
                        <tr>
                            <th scope="row">{{ $loop->index +1 }}</th>
                            <td>{{$param->previous}}</td>
                            <td>{{$param->name}}</td>
                            <td>{{$param->next}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4 class="card-title">No Middleware</h4>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{route('apis.middlewares.binder', ['api'=>$api->id])}}" target="_blank"
           class="btn btn-outline-info rounded-pill">Bind Middlewares</a>
    </div>
</div>

