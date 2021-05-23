<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rules',
        'example',
        'api_id',
        'parent_id',
    ];
}
