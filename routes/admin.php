<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin/index');
})->name('admin.dashboard');

Route::get('/users', [UserController::class, 'index'])
    ->name('admin.users');
Route::post('/users', [UserController::class, 'create'])
    ->name('admin.user.create');
Route::delete('/users/{userId}', [UserController::class, 'delete'])
    ->name('admin.user.delete');
Route::patch('/users/{userId}', [UserController::class, 'update'])
    ->name('admin.user.update');

Route::get('/user/{userId}/rights', function () {
    return view('admin/index');
})->name('admin.user.rights');

Route::get('/user-groups', function () {
    return view('admin/index');
})->name('admin.user-groups');

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
