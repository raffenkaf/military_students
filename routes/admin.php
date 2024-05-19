<?php

use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\KnowledgeEntityController;
use App\Http\Controllers\Admin\KnowledgeEntityGroupController;
use App\Http\Controllers\Admin\QuestionTopicController;
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
    ->name('admin.user-group.create');
Route::post('/user-groups', [UserGroupController::class, 'store'])
    ->name('admin.user-group.store');
Route::get('/user-groups/{userGroup}/edit', [UserGroupController::class, 'edit'])
    ->name('admin.user-group.edit');
Route::put('/user-groups/{userGroup}', [UserGroupController::class, 'update'])
    ->name('admin.user-group.update');
Route::delete('/user-groups/{userGroup}', [UserGroupController::class, 'destroy'])
    ->name('admin.user-group.delete');

Route::get('/question-topics', [QuestionTopicController::class, 'index'])
    ->name('admin.question-topics');
Route::get('/question-topics/create', [QuestionTopicController::class, 'create'])
    ->name('admin.question-topic.create');
Route::post('/question-topics', [QuestionTopicController::class, 'store'])
    ->name('admin.question-topic.store');
Route::delete('/question-topics/{questionTopic}', [QuestionTopicController::class, 'destroy'])
    ->name('admin.question-topic.delete');
Route::get('/question-topics/{questionTopic}/edit', [QuestionTopicController::class, 'edit'])
    ->name('admin.question-topic.edit');
Route::put('/question-topics/{questionTopic}', [QuestionTopicController::class, 'update'])
    ->name('admin.question-topic.update');

Route::get('/question-topic/{questionTopicId}/questions', function () {
    return view('admin/index');
})->name('admin.question-topic.questions');

Route::get('/question-topic/{questionTopicId}/questions/{questionId}/options', function () {
    return view('admin/index');
})->name('admin.question-topic.question.answers');

Route::get('/exams', [ExamController::class, 'index'])
    ->name('admin.exams');
Route::get('/exams/create', [ExamController::class, 'create'])
    ->name('admin.exam.create');
Route::post('/exams', [ExamController::class, 'store'])
    ->name('admin.exam.store');
Route::delete('/exams/{questionTopic}', [ExamController::class, 'destroy'])
    ->name('admin.exam.delete');
Route::get('/exams/{questionTopic}/edit', [ExamController::class, 'edit'])
    ->name('admin.exam.edit');
Route::put('/exams/{questionTopic}', [ExamController::class, 'update'])
    ->name('admin.exam.update');

Route::get('/knowledge-entity-groups', [KnowledgeEntityGroupController::class, 'index'])
    ->name('admin.knowledge-entity-groups');
Route::get('/knowledge-entity-groups/create', [KnowledgeEntityGroupController::class, 'create'])
    ->name('admin.knowledge-entity-group.create');
Route::post('/knowledge-entity-groups', [KnowledgeEntityGroupController::class, 'store'])
    ->name('admin.knowledge-entity-group.store');
Route::get('/knowledge-entity-groups/{knowledgeEntityGroup}/edit', [KnowledgeEntityGroupController::class, 'edit'])
    ->name('admin.knowledge-entity-group.edit');
Route::put('/knowledge-entity-groups/{knowledgeEntityGroup}', [KnowledgeEntityGroupController::class, 'update'])
    ->name('admin.knowledge-entity-group.update');
Route::delete('/knowledge-entity-groups/{knowledgeEntityGroup}', [KnowledgeEntityGroupController::class, 'destroy'])
    ->name('admin.knowledge-entity-group.delete');

Route::get('/knowledge-entity-group/{knowledgeEntityGroup}/knowledge-entities', [KnowledgeEntityController::class, 'index'])
    ->name('admin.knowledge-entity-group.knowledge-entities');
Route::get('/knowledge-entity-group/{knowledgeEntityGroup}/knowledge-entities/create', [KnowledgeEntityController::class, 'create'])
    ->name('admin.knowledge-entity-group.knowledge-entity.create');
Route::post('/knowledge-entity-group/{knowledgeEntityGroup}/knowledge-entities', [KnowledgeEntityController::class, 'store'])
    ->name('admin.knowledge-entity-group.knowledge-entity.store');
Route::get('/knowledge-entity-group/{knowledgeEntityGroup}/knowledge-entities/{knowledgeEntity}/edit', [KnowledgeEntityController::class, 'edit'])
    ->scopeBindings()
    ->name('admin.knowledge-entity-group.knowledge-entity.edit');
Route::put('/knowledge-entity-group/{knowledgeEntityGroup}/knowledge-entities/{knowledgeEntity}', [KnowledgeEntityController::class, 'update'])
    ->scopeBindings()
    ->name('admin.knowledge-entity-group.knowledge-entity.update');
Route::delete('/knowledge-entity-group/{knowledgeEntityGroup}/knowledge-entities/{knowledgeEntity}', [KnowledgeEntityController::class, 'destroy'])
    ->scopeBindings()
    ->name('admin.knowledge-entity-group.knowledge-entity.delete');

Route::get('/exam-results', function () {
    return view('admin/index');
})->name('admin.exam-results');
