<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'route' => $this->route,
            'url' => sprintf('http://mekapps.ir%s', $this->route),
            'route_name' => $this->name,
            'version' => $this->version,
            'scope' => $this->scope,
            'description' => $this->description,
            'method' => $this->type,
            'body' => $this->body,
            'params_count' => $this->params_count,
            'headers_count' => $this->headers_count,
            'queries_count' => $this->queries_count,
            'responses_count' => $this->responses_count,
            'middlewares_count' => $this->middlewares_count,
            'author' => new AuthorResource($this->whenLoaded('author')),
            'params' => ParamResource::collection($this->whenLoaded('params')),
            'headers' => HeaderResource::collection($this->whenLoaded('headers')),
            'queries' => QueryResource::collection($this->whenLoaded('queries')),
            'responses' => ResponseResource::collection($this->whenLoaded('responses')),
            'middlewares' => MiddlewareResource::collection($this->whenLoaded('middlewares')),
            'created_at' => $this->created_at,
        ];
    }
}
