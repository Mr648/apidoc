<?php

namespace App\Http\Controllers;

use App\Models\Api;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponsesController extends Controller
{
    public function create($api)
    {
        return view('response.create', [
            'route' => route('apis.responses.store', ['api' => $api])
            , 'api' => $api
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'api' => 'required|integer|exists:apis,id',
            'code' => 'nullable|string|in:200,201,204,202,400,404,403,401,504,408,303,503,500',
            'type' => 'nullable|string|in:json,html,text,image,file,view',
            'sample' => 'nullable|string|max:5000',
        ]);

        $api = Api::find($request->get('api'));
        $response = new \App\Models\Response([
            'code' => $request->get('code'),
            'type' => $request->get('type'),
            'sample' => $request->get('sample'),
        ]);

        $api->responses()->save($response);

        return redirect()->back(Response::HTTP_CREATED)->with([
            'success' => [
                'message' => 'Response created successfully',
                'link' => route('apis.show', ['api' => $api->id])
            ]
        ]);
    }
}
