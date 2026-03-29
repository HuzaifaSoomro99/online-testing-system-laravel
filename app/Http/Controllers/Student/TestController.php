<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Result;

class TestController extends Controller
{
    public function start()
    {
        if (!session()->has('account_id')) {
            return redirect('/students');
        }
        $questions = Question::with('answers')->get()->map(function ($q) {
            return [
                'id' => $q->id,
                'question' => $q->question,
                'answerkey' => $q->answerkey, 
                'answers' => $q->answers->map(function ($a) {
                    return [
                        'id' => $a->id,
                        'answers' => $a->answers
                    ];
                })->toArray()
            ];
        })->toArray();

        session([
            'questions' => $questions,
            'answers' => [],
            'start_time' => time(),
            'test_duration' => 15 * 60
        ]);

        return redirect('/test/question/0');
    }

public function show($no)
{
    $questions = session('questions');

    if ($no >= count($questions)) {
        return view('students.test', [
            'index' => count($questions),
            'total' => count($questions)
        ]);
    }

    $remaining = (session('start_time') + session('test_duration')) - time();

    if ($remaining <= 0) {
        return redirect('/test/submit');
    }

    return view('students.test', [
        'question' => $questions[$no],
        'index' => $no,
        'total' => count($questions),
        'selected' => session('answers')[$questions[$no]['id']] ?? null,
        'remaining' => $remaining
    ]);
}

public function saveAnswer(Request $req)
{
    $answers = session('answers', []);
    $answers[$req->question_id] = $req->answer;
    session(['answers' => $answers]);

    $questions = session('questions');
    $nextIndex = $req->next;

    if ($nextIndex >= count($questions)) {
        return redirect('/test/question/' . count($questions));
    }

    return redirect('/test/question/' . $nextIndex);
}

    public function submit()
{
    $questions = session('questions');
    $userans = session('answers');
    $correct = 0;

    foreach($questions as $q){
        if(!isset($userans[$q['id']])) continue;

        $selectedAnswerId = $userans[$q['id']];

        $answerText = collect($q['answers'])->firstWhere('id', $selectedAnswerId)['answers'] ?? null;

        if($answerText === $q['answerkey']){
            $correct++;
        }
    }

    $total = count($questions);
    $wrong = $total - $correct;
    $percentage = ($correct / $total) * 100;

    Result::create([
        'account_id' => session('account_id'),
        'totalquestions' => $total,
        'correct' => $correct,
        'wrong' => $wrong,
        'obtainmarks' => $correct,
        'percentage' => $percentage,
        'status' => $percentage >= 50 ? 'pass' : 'Fail',
        'date' => now(),
        'duration' => round((time() - session('start_time')) / 60),
        'no_of_attempts' => 1
    ]);

    session()->forget(['questions', 'answers', 'start_time']);

    return view('students.result', compact(
        'total', 'correct', 'wrong', 'percentage'
    ));
}
}
