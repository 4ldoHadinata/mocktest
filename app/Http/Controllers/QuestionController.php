<?php

namespace App\Http\Controllers;

use App\Question;
use App\Subject;
use Illuminate\Http\Request;
use Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = $_GET['id'];
        $subject = Subject::findOrFail($id);
        $questions = Question::where('subject_id', $id)->where('user_id', Auth::id())->get();

        return view('pages.question.index', compact('subject', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();

        Question::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('pages.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->all();
        
        $question = Question::findOrFail($id);

        $question->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->back();
    }

    public function test()
    {
        $id = $_GET['id'];
        $subject = Subject::findOrFail($id);
        $questions = Question::where('subject_id', $id)->where('user_id', Auth::id())->get();

        return view('pages.test', compact('subject', 'questions'));
    }

    public function answer()
    {
        $id = $_GET['id'];
        $subject = Subject::findOrFail($id);
        $questions = Question::where('subject_id', $id)->where('user_id', Auth::id())->get();
        session()->flash('done', "it's done");

        return redirect()->back();
    }
}
