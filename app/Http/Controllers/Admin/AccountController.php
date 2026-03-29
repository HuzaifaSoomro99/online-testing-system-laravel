<?php

namespace App\Http\Controllers\Admin;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
      $accounts = Account::all();
      return view('students.accounts.index', compact('accounts'));
    }

    public function create(){
      return view('students.accounts.add');
    }

    public function store(Request $req){
        $req->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'cnic' => 'required|unique:accounts',
            'gender' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        Account::create([
        'firstname' => $req->fname,
        'lastname'  => $req->lname,
        'cnic'      => $req->cnic,
        'gender'    => $req->gender,
        'email'     => $req->email,
        'password'  => Hash::make($req->password)
        ]);
        return redirect()->route('student.login')->with('success', 'Record Added Successfully');
    }

    public function edit($id){
        $account = Account::findOrFail($id);
        return view('students.accounts.edit', compact('account'));
    }

    public function update(Request $req, $id){
        $account = Account::findOrFail($id);
            $req->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'cnic' => 'required|unique:accounts,cnic,' . $account->id,
            'gender' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string'
        ]);

         $data = [
        'firstname' => $req->fname,
        'lastname'  => $req->lname,
        'cnic'      => $req->cnic,
        'gender'    => $req->gender,
        'email'     => $req->email,
        ];
        if($req->filled('password')){
            $data['password'] = Hash::make($req->password);
        }

        $account->update($data);
        return redirect()->route('std.dashboard');        
    }

    public function delete($id){
        $account = Account::findOrFail($id)->delete();
        return redirect()->route('students.accounts.index')->with('success', 'Record Deleted Successfully');        
    }
}
