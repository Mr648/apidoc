<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QueriesController extends Controller
{
    public function create($api)
    {
        return view('query.create', [
            'route' => route('apis.queries.store', ['api' => $api])
            , 'api' => $api
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'api' => 'required|integer|exists:apis,id',
            'name' => 'nullable|string|max:255',
            'key' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'required' => 'nullable|string|in:on',
            'example' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $api = Api::find($request->get('api'));

        $query = new Query([
            'name' => $request->get('name'),
            'key' => $request->get('key'),
            'type' => $request->get('type'),
            'required' => $request->get('required') !== null ? 1 : 0,
            'example' => $request->get('example'),
            'description' => $request->get('description'),
        ]);

        $api->queries()->save($query);
        return redirect()->back(Response::HTTP_CREATED)->with([
            'success' => [
                'message' => 'Query created successfully',
                'link' => route('apis.show', ['api' => $api->id])
            ]
        ]);
    }
}
