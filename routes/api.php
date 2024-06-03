<?php

use App\Http\Controllers\API\ProjectControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('projects', [ProjectControler::class, 'index']);
Route::get('latest', [ProjectControler::class, 'latest']);
Route::get('projects/{project:slug}', [ProjectControler::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
