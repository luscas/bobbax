<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\Streaming\StreamingController;
use App\Http\Controllers\TeamController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/news/{id}/{titulo}', [NewsController::class, 'index'])->where('id', '[0-9]+');
Route::post('/news/request/comment', [NewsController::class, 'create']);
Route::get('/bobbax/equipe', [TeamController::class, 'index']);

Route::post('/auth/login', [LoginController::class, 'authenticate']);
Route::post('/auth/register', [LoginController::class, 'create']);
Route::get('/auth/logout', [LoginController::class, 'logout']);

Route::get('/streaming/{name}', [StreamingController::class, 'stats']);

Route::get('/streaming', [StreamingController::class, 'index']);


Route::get('/paginas/{id}-{name}', [PaginaController::class, 'index']);
