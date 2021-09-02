<?php

namespace App\Http\Controllers;

use App\QuestionAnswer;
use App\Tag;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = QuestionAnswer::all();
        return view('admin.question-answer.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.question-answer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'name' => 'required',
            'question' => 'required',
            'date' => 'required'
        ]);

        QuestionAnswer::create($data);
        return redirect(action('QuestionAnswerController@index'))->with('save', '"Pertanyaan" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question =  QuestionAnswer::find($id);
        $answers =  QuestionAnswer::where('parent_id', $id)->get();
        return view('admin.question-answer.show', compact('question', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question =  QuestionAnswer::find($id);
        return view('admin.question-answer.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'name' => 'required',
            'question' => 'required',
        ]);

        $question =  QuestionAnswer::find($id);
        $question->update($data);
        return redirect(action('QuestionAnswerController@index'))->with('update', '"Pertanyaan" Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question =  QuestionAnswer::find($id);
        $question->delete();
        return redirect(action('QuestionAnswerController@index'))->with('delete', '"Pertanyaan" Berhasil Dihapus');
    }

    public function createAnswer($id)
    {
        $question =  QuestionAnswer::find($id);
        return view('admin.question-answer.create-answer', compact('question'));
    }

    public function storeAnswer(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'parent_id' => 'required',
            'date' => 'required',
        ]);

        QuestionAnswer::create($data);
        return redirect(action('QuestionAnswerController@index'))->with('success', '"Jawaban" Berhasil Ditambah');
    }
}
