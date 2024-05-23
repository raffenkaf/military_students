<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreQuestionTopicRequest;
use App\Http\Requests\Admin\UpdateQuestionTopicRequest;
use App\Models\QuestionTopic;
use App\Repositories\Admin\QuestionTopicRepository;
use Illuminate\Http\Request;

class QuestionTopicController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, QuestionTopicRepository $repository)
    {
        $searchParam = $request->get('searchByIdOrName');

        if ($searchParam) {
            $questionTopics = $repository->searchByIdOrName($searchParam);
        } else {
            $questionTopics = QuestionTopic::lastCreated();
        }

        return view(
            'admin.question-topics.index',
            ['questionTopics' => $questionTopics, 'searchParam' => $searchParam]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.question-topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionTopicRequest $request)
    {
        $validated = $request->validated();

        $questionTopic = new QuestionTopic($validated);
        $questionTopic->save();

        $request
            ->session()
            ->flash('success', "Тема питань створена(id - {$questionTopic->id})");

        return redirect()->route('admin.question-topics');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionTopic $questionTopic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionTopic $questionTopic)
    {
        return view('admin.question-topics.edit', ['questionTopic' => $questionTopic]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionTopicRequest $request, QuestionTopic $questionTopic)
    {
        $validated = $request->validated();

        $questionTopic->fill($validated);
        $questionTopic->save();

        $request
            ->session()
            ->flash('success', "Тема питань оновлена(id - {$questionTopic->id})");

        return redirect()->route('admin.question-topics');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionTopic $questionTopic, Request $request)
    {
        $questionTopic->delete();

        $request
            ->session()
            ->flash('success', "Тема питань видалена(id - {$questionTopic->id})");

        return redirect()->route('admin.question-topics');
    }
}
