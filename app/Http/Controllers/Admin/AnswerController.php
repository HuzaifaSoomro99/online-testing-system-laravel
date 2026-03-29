<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
class AnswerController extends Controller
{
    public function index(){
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        $data = Answer::with('question')->get();
        return view('admin.answers.index', compact('data'));
    }

    public function create(){
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        $questions = Question::all();
        return view('admin.answers.add', compact('questions'));
    }

    public function store(Request $req){
        $req->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
        Answer::create([
            'question_id' => $req->question,
            'answers' => $req->answer
        ]);

        return redirect()->route('admin.answers.index')->with('success','Record Added Successfully!');
    }

    public function edit($id){
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        $answer = Answer::findOrFail($id);
        $questions = Question::all();
        return view('admin.answers.edit',compact('answer','questions'));
    }

    public function update(Request $req, $id){
        $req->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $data = Answer::findOrFail($id);
        $data->update([
            'question_id' => $req->question,
            'answers' => $req->answer
        ]);

        return redirect()->route('admin.answers.index')->with('success','Record Updated Successfully!');
    }

    public function delete($id){
        $ans = Answer::findOrFail($id)->delete();
        return redirect()->route('admin.answers.index')->with('success','Record Deleted Successfully!');
    }
}
