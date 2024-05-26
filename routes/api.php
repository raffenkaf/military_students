<?php

use App\Http\Controllers\Api\KnowledgeEntityGroupController;
use App\Http\Controllers\Api\UserGroupController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user-groups', [UserGroupController::class, 'index'])
    ->name('api.user-groups');
Route::get('/knowledge-entity-groups', [KnowledgeEntityGroupController::class, 'index'])
    ->name('api.knowledge-entity-groups');
