<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Account; // ✅ MISSING IMPORT FIXED

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }

        // ✅ Better & faster than count(Model::all())
        $questions = Question::count();
        $accounts  = Account::count();
        $results   = Result::count();

        return view('admin.dashboard', compact(
            'questions',
            'accounts',
            'results'
        ));
    }
}
