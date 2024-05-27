<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Answer::class);

        return Answer::all();
    }

    public function store(AnswerRequest $request)
    {
        $this->authorize('create', Answer::class);

        return Answer::create($request->validated());
    }

    public function show(Answer $answer)
    {
        $this->authorize('view', $answer);

        return $answer;
    }

    public function update(AnswerRequest $request, Answer $answer)
    {
        $this->authorize('update', $answer);

        $answer->update($request->validated());

        return $answer;
    }

    public function destroy(Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        return response()->json();
    }
}
