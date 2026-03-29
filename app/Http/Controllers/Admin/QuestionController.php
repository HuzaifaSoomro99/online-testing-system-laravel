<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    
    public function index(){
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    public function create(){
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        return view('admin.questions.add');
    }

    public function store(Request $req){
        $req->validate([
            'question' => 'required|string',
            'answerkey' => 'required|string'
        ]);
        Question::create([
            'question' => $req->question,
            'answerkey' => $req->answerkey
        ]);
        return redirect()->route('admin.questions.index')->with('success', 'Record Added Successfully!');
    }

    public function edit($id){
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        $data = Question::findOrFail($id);
        return view('admin.questions.edit', compact('data'));
    }

    public function update(Request $req, $id){
        $req->validate([
            'question' => 'required|string',
            'answerkey' => 'required|string'
        ]);
        $data = Question::findOrFail($id);
        $data->update([
            'question' => $req->question,
            'answerkey' => $req->answerkey,
        ]);

        return redirect()->route('admin.questions.index')->with('success', 'Record Updated Successfully!');
    }

    public function delete($id){
        $data = Question::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Record Deleted Successfully!');
    }
}
