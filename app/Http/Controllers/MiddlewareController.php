<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Middleware;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MiddlewareController extends Controller
{
    public function index()
    {
        $middlewares = Middleware::all();
        return view('middleware.index', compact('middlewares'));
    }

    public function create()
    {
        return view('middleware.create', ['route' => route('middlewares.store')]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'previous' => 'nullable|string|max:255',
            'next' => 'nullable|string|max:255',
        ]);

        $middlware = Middleware::updateOrCreate(
            [
                'name' => $request->get('name'),
            ], [
                'previous' => $request->get('previous'),
                'next' => $request->get('next'),
            ]
        );

        return redirect()->back(Response::HTTP_CREATED)->with([
            'success' => [
                'message' => 'Middleware created successfully',
                'link' => route('middlewares.index')
            ]
        ]);
    }

    public function binder($api)
    {
        $params = [];

        Middleware::select(['id', 'name'])->get()->each(function ($item) use (&$params) {
            $params[$item->id] = ucfirst($item->name);
        });
        if (count($params) == 0)
            return redirect(route('middlewares.create'));

        return view('middleware.binder', [
            'route' => route('apis.middlewares.bind', ['api' => $api])
            , 'api' => $api
            , 'params' => $params
        ]);
    }


    public function bind(Request $request, $api)
    {

        $this->validate($request, [
            'api' => 'required|integer|exists:apis,id',
            'middleware' => 'required|integer|exists:middlewares,id'
        ]);
        $api = Api::find($request->get('api'));
        $middleware = Middleware::find($request->get('middleware'));

        $api->middlewares()->attach($middleware);
        return redirect()->back(Response::HTTP_CREATED)->with([
            'success' => [
                'message' => 'Middleware bound successfully',
                'link' => route('apis.middlewares.binder', ['api' => $api])
            ]
        ]);
    }
}
