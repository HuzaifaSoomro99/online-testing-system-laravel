<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class StdAuthController extends Controller
{
    public function showlogin(){
        return view('students.login');
    }

    public function login(Request $req){
        $req->validate([
            'cnic' => 'required',
            'password' => 'required'
        ]);
        $account = Account::Where('cnic', $req->cnic)->first();
        if(!$account || !Hash::check($req->password, $account['password'])){
            return back()->with('error', 'Invalid Email or Password');
        }

        session(['account_id' => $account->id]);
        return redirect('/student/dashboard')->with('success', 'Login Successfully!');
    }
    
    public function logout(){
        session()->forget('account_id');
        return redirect('/students');
    }

    public function dashboard(){
        $account = Account::find(session('account_id'));
        return view('students.dashboard', compact('account'));
    }
}
