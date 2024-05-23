<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExamRequest;
use App\Http\Requests\Admin\UpdateExamRequest;
use App\Models\Exam;
use App\Models\QuestionTopic;
use App\Repositories\Admin\ExamRepository;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchParam = $request->get('searchById');

        if ($searchParam) {
            $exams = Exam::find($searchParam);
        } else {
            $exams = Exam::lastCreated();
        }

        return view(
            'admin.exams.index',
            ['exams' => $exams, 'searchParam' => $searchParam]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exams.create', ['questionTopics' => QuestionTopic::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        $validated = $request->validated();
        $exam = new Exam($validated);
        $exam->creator_user_id = auth()->id();

        $exam->save();

        $request
            ->session()
            ->flash('success', "Екзамен призначений(id - {$exam->id})");

        return redirect()->route('admin.exams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
