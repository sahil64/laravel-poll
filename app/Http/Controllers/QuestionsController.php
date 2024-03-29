<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Illuminate\Support\Facades\Gate;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$questions =Question::latest()->paginate(5);

        $questions =Question::with('user')->latest()->paginate(5);

        return view('questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question =new Question();

        return view('questions.create',compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        //dd('store');
        $request->user()->questions()->create($request->only('title','body'));

        return redirect()->route('questions.index')->with('success','Your Question has been saved successfully!!!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //dd($question);
        $question->increment('views');
        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        /*if(!Gate::allows('update-question',$question)){
            abort(403,"Access Denied");
        }*/
        if (!$this->authorize('update', $question)) {
            abort(403,"Access Denied");
        }

        return view("questions.edit",compact('question'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        /*if(!Gate::allows('update-question',$question)){
            abort(403,"Access Denied");
        }*/
        if ($request->user()->cannot('update', $question)) {
            abort(404,"Access not Granted for Updaing Question");
        }

        $question->update($request->only('title','body'));
        return redirect('/questions')->with('success','your question has been updated successfully!! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //if(!Gate::allows('delete-question',$question)){
        //    abort(403,"Access Denied");
        //}
        $question->delete();
        return redirect('/questions')->with('success','your question has been deleted successfully!! ');

    }
}
