<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Account;

class ResultController extends Controller
{
    public function index(){
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
      $results = Result::With('account')->get();
      return view('admin.results.index', compact('results'));
    }
    public function show($account_id){
        $result = Result::with('account')->Where('account_id', $account_id)->get();
        

        return view('students.result.index', compact('result'));
    }
    public function delete($id){
        $result = Result::FindOrFail($id);
        $result->delete();
        return redirect()->route('admin.result')->with('success', 'Record Deleted Successfuly!');
    }

}
