<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showlogin(){
        return view('welcome');
    }

    public function login(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $auth = User::Where('email', $req->email)-> first();

        if(!$auth || !Hash::check($req->password, $auth['password'])){
            return back()->with('error', 'Invalid Email or Password');
        }
        session(['admin_id' => $auth->id]);
        return redirect('/admin/dashboard');
    }

    public function logout()
    {
        return redirect('/');
    }
}
