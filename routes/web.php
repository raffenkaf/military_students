<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Web\KnowledgeEntityController;
use App\Http\Controllers\Web\KnowledgeEntityGroupController;
use App\Models\KnowledgeEntityGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [KnowledgeEntityGroupController::class, 'index'])
    ->name('home');
Route::get('knowledge-entity-group/{knowledgeEntityGroup}', [KnowledgeEntityGroupController::class, 'show'])
    ->can('view', 'knowledgeEntityGroup')
    ->name('knowledge-entity-group');
Route::get(
        'knowledge-entity-group/{knowledgeEntityGroup}/knowledge-entity/{knowledgeEntity}',
        [KnowledgeEntityController::class, 'show']
    )
    ->scopeBindings()
    ->can('view', 'knowledgeEntityGroup')
    ->name('knowledge-entity-group');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('scheduled-exams', function () {
        // TEMP stub
        return view('guest-index');
    })->name('scheduled-exams');
});
