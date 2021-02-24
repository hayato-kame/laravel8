<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello',HelloController::class);

Route::get('/hello',[ HelloController::class, 'index' ]);
// Route::get('/hello/other',[HelloController::class, 'other']);
Route::post('/hello', [ HelloController::class, 'post' ]);


// Route::get('hello', 'App\Http\Controllers\HelloController@index');
// Route::get('hello/other', 'App\Http\Controllers\HelloController@other');

Route::get('/hello/add', [ HelloController::class, 'add' ]);
Route::post('/hello/add', [ HelloController::class, 'create' ]);

Route::get('/hello/edit', [ HelloController::class, 'edit' ]);
Route::post('/hello/edit', [ HelloController::class, 'update' ]);

Route::get('/hello/del', [ HelloController::class, 'del']);
Route::post('/hello/del', [ HelloController::class, 'remove' ]);
