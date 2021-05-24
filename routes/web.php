<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HeadersController;
use App\Http\Controllers\MiddlewareController;
use App\Http\Controllers\ParamsController;
use App\Http\Controllers\QueriesController;
use App\Http\Controllers\ResponsesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/', '/apis');

Route::resource('apis', ApiController::class)->except([
    'update',
    'destroy',
    'edit'
]);

Route::resource('middlewares', MiddlewareController::class)->except([
    'update',
    'destroy',
    'edit',
    'show'
]);

$excepts = [
    'update',
    'destroy',
    'index',
    'show',
    'edit'
];

Route::resource('apis.params', ParamsController::class)->except($excepts)->shallow();
Route::resource('apis.headers', HeadersController::class)->except($excepts)->shallow();
Route::resource('apis.queries', QueriesController::class)->except($excepts)->shallow();
Route::resource('apis.responses', ResponsesController::class)->except($excepts)->shallow();

Route::get('/apis/{api}/middlewares/bind', [MiddlewareController::class, 'binder'])
    ->name('apis.middlewares.binder');

Route::post('/apis/{api}/middlewares', [MiddlewareController::class, 'bind'])
    ->name('apis.middlewares.bind');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
