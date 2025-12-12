<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
{
    $quizzes = Quiz::all();
    return view('quiz.quiz_index', compact('quizzes'));
}

public function create()
{
    return view('quiz.quiz_create');
}

public function store(Request $request)
{
    Quiz::create([
        'question' => $request->question,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
        'correct_answer' => $request->correct_answer,
    ]);

    return redirect()->route('quiz.index');
}

public function show($id)
{
    $quiz = Quiz::findOrFail($id);
    return view('quiz.quiz_show', compact('quiz'));
}

public function edit($id)
{
    $quiz = Quiz::findOrFail($id);
    return view('quiz.quiz_edit', compact('quiz'));
}

public function update(Request $request, $id)
{
    $quiz = Quiz::findOrFail($id);
    $quiz->update($request->all());
    return redirect()->route('quiz.index');
}

public function destroy($id)
{
    Quiz::destroy($id);
    return redirect()->route('quiz.index');
}

}
