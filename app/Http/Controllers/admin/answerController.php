<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class answerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::all();

        return view('admin.answer.list', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        return view('admin.answer.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $answer = new Answer();
        $answer->id_question = $request->id_question;
        $answer->title = $request->title;
        $answer->answer = $request->answer;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $path = $file->store('source', 'public');
            $answer->file = $path;
        }
        $answer->save();
        Session::flash('success', 'Add Successfully');
        return redirect()->route('answer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::find($id);
        $questions = Question::all();
        return view('admin.answer.edit', compact('questions', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::find($id);
        $answer->id_question = $request->id_question;
        $answer->title = $request->title;
        $answer->answer = $request->answer;
        if ($request->hasFile('file')) {

            //xoa anh cu neu co
            $currentFile = $answer->file;
            if ($currentFile) {
                Storage::delete('/public/' . $currentFile);
            }
            // cap nhat anh moi
            $file = $request->file;
            $path = $file->store('source', 'public');
            $answer->file = $path;
        }
        $answer->save();
        Session::flash('success', 'Update Successfully');
        return redirect()->route('answer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);
        $file = $answer->file;
        if ($file) {
            Storage::delete('/public/' . $file);
        }
        $answer->delete();
        Session::flash('success', 'Delete Successfully');
        return redirect()->route('answer.index');
    }
}
