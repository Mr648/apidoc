<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\Api;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Http\Request;
use PDF;

class ApiController extends Controller
{

    public function index(Request $request)
    {

        $type = $request->input('type');

        $apis = Api::with(['author'])
            ->withCount([
                'params',
                'headers',
                'queries',
                'responses',
                'middlewares'
            ]);

        if (!is_null($type) && in_array($type, ['get', 'post', 'delete', 'put', 'patch', 'head']))
            $apis->where('type', strtoupper($type));

        $apis = $apis->get();

        return view('api.table', compact('apis'));
    }

    public function show(Api $api)
    {
        $api->load(['author'])
            ->loadCount([
                'params',
                'headers',
                'queries',
                'responses',
                'middlewares'
            ]);
        return view('api.show', compact('api'));
    }

    public function create()
    {
        return view('api.create', ['route' => route('apis.store')]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'route' => 'required|string',
            'name' => 'required|string',
            'version' => 'required|string',
            'scope' => 'required|string',
            'type' => 'required|string',
            'body' => 'required|string',
            'description' => 'required|string|max:2500',
        ]);

        $api = new Api([
            'route' => $request->get('route'),
            'name' => $request->get('name'),
            'version' => $request->get('version'),
            'scope' => $request->get('scope'),
            'type' => $request->get('type'),
            'body' => $request->get('body'),
            'description' => $request->get('description'),
        ]);

        auth()->user()->apis()->save($api);
        return redirect()->back();
    }

    public function toPdf(Api $api)
    {
        $api->load([
            'author',
            'params',
            'headers',
            'queries',
            'responses',
            'middlewares'
        ])->loadCount([
            'params',
            'headers',
            'queries',
            'responses',
            'middlewares'
        ]);
//        $html = view('api.pdf', compact('api'))->render();
        $pdf = PDF::loadView('api.pdf', compact('api'));
        $filename = sprintf('apis_%s_%d.pdf', unique_code(15), $api->id);
        return $pdf->download($filename);
    }

    public function simple(Api $api)
    {

        $api->load([
            'author',
            'params',
            'headers',
            'queries',
            'responses',
            'middlewares'
        ])->loadCount([
            'params',
            'headers',
            'queries',
            'responses',
            'middlewares'
        ]);
        return view('api.pdf', compact('api'));
    }
    public function json(Api $api)
    {
        $api->load([
            'author',
            'params',
            'headers',
            'queries',
            'responses',
            'middlewares'
        ])->loadCount([
            'params',
            'headers',
            'queries',
            'responses',
            'middlewares'
        ]);

        return response()->json(new ApiResource($api));
    }
}
