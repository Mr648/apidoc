<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParamsController extends Controller
{
    public function create($api)
    {
        $params = [];

        Param::select(['id', 'name'])->get()->each(function ($item) use (&$params) {
            $params[$item->id] = ucfirst($item->name);
        });

        return view('param.create', [
            'route' => route('apis.params.store', ['api' => $api])
            , 'api' => $api
            , 'params' => $params
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'api' => 'required|integer|exists:apis,id',
            'parent' => 'nullable|integer|exists:params,id',
            'name' => 'nullable|string|max:255',
            'rules' => 'nullable|string|max:255',
            'example' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
        $api = Api::find($request->get('api'));
        $param = new Param([
            'parent_id' => $request->get('parent'),
            'name' => $request->get('name'),
            'rules' => $request->get('rules'),
            'example' => $request->get('example'),
            'description' => $request->get('description'),
        ]);
        $api->params()->save($param);
        return redirect()->back(Response::HTTP_CREATED)->with([
            'success' => [
                'message' => 'Parameter created successfully',
                'link' => route('apis.show', ['api' => $api->id])
            ]
        ]);
    }
}
