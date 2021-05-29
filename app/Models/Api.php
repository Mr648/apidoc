<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    protected $appends=[
        'style'
    ];
    protected $fillable = [
        'route',
        'name',
        'version',
        'scope',
        'type',
        'body',
        'description',
    ];

    protected $styles = [
        'GET' => 'badge badge-light rounded-pill text-info',
        'POST' => 'badge badge-light rounded-pill text-success',
        'PUT' => 'badge badge-light rounded-pill text-warning',
        'PATCH' => 'badge badge-light rounded-pill text-secondary',
        'ANY' => 'badge badge-light rounded-pill text-dark',
        'DELETE' => 'badge badge-light rounded-pill text-danger',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function params()
    {
        return $this->hasMany(Param::class);
    }

    public function headers()
    {
        return $this->hasMany(Header::class);
    }

    public function queries()
    {
        return $this->hasMany(Query::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function middlewares()
    {
        return $this->belongsToMany(Middleware::class, 'api_middleware');
    }


    public function getStyleAttribute()
    {
        return $this->styles[$this->type];
    }
}
