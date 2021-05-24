<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Middleware extends Model
{
    use HasFactory;

    protected $table = 'middlewares';

    protected $fillable = [
        'previous',
        'name',
        'next',
    ];
}
