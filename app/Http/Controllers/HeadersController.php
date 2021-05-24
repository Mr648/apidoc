<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HeadersController extends Controller
{
    public function create($api)
    {
        return view('header.create', [
            'route' => route('apis.headers.store', ['api' => $api])
            , 'api' => $api
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'api' => 'required|integer|exists:apis,id',
            'name' => 'nullable|string|max:255',
            'value' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $api = Api::find($request->get('api'));

        $header = new Header([
            'name' => $request->get('name'),
            'value' => $request->get('value'),
            'description' => $request->get('description'),
        ]);

        $api->headers()->save($header);

        return redirect()->back(Response::HTTP_CREATED)->with([
            'success' => [
                'message' => 'Header created successfully',
                'link' => route('apis.show', ['api' => $api->id])
            ],
        ]);
    }
}
