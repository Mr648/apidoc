<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    protected $fillable = [
        'route',
        'name',
        'version',
        'scope',
        'type',
        'body',
        'description',
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
}
