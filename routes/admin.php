<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin/index');
})->name('admin.dashboard');

Route::get('/users', [UserController::class, 'index'])
    ->name('admin.users');
Route::post('/users', [UserController::class, 'create'])
    ->name('admin.user.store');
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('admin.user.delete');
Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('admin.user.update');

Route::get('/user/{userId}/rights', function () {
    return view('admin/index');
})->name('admin.user.rights');

Route::get('/user-groups', [UserGroupController::class, 'index'])
    ->name('admin.user-groups');
Route::get('/user-groups/create', [UserGroupController::class, 'create'])
    ->name('admin.user-groups.create');
Route::post('/user-groups', [UserGroupController::class, 'store'])
    ->name('admin.user-group.store');
Route::get('/user-groups/{userGroup}/edit', [UserGroupController::class, 'edit'])
    ->name('admin.user-group.edit');
Route::put('/user-groups/{userGroup}', [UserGroupController::class, 'update'])
    ->name('admin.user-group.update');
Route::delete('/user-groups/{userGroup}', [UserGroupController::class, 'destroy'])
    ->name('admin.user-group.delete');

Route::get('/question-topics', function () {
    return view('admin/index');
})->name('admin.question-topics');

Route::get('/question-topic/{questionTopicId}/questions', function () {
    return view('admin/index');
})->name('admin.question-topic.questions');

Route::get('/question-topic/{questionTopicId}/questions/{questionId}/options', function () {
    return view('admin/index');
})->name('admin.question-topic.question.answers');

Route::get('/exams', function () {
    return view('admin/index');
})->name('admin.exams');

Route::get('/knowledge-entity-groups', function () {
    return view('admin/index');
})->name('admin.knowledge-entity-groups');

Route::get('/knowledge-entity-group/{knowledgeEntityGroupId}/knowledge-entities', function () {
    return view('admin/index');
})->name('admin.knowledge-entity-group.knowledge-entities');

Route::get('/exam-results', function () {
    return view('admin/index');
})->name('admin.exam-results');
