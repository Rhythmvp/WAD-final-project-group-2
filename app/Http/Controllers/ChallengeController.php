<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
   public function index()
{
    $challenges = Challenge::all();
    return view('challenges.challenge_index', compact('challenges'));
}

public function create()
{
    return view('challenges.challenge_create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'points' => 'nullable|integer',
        'duration' => 'nullable|string',
    ]);
    
    Challenge::create($request->all());
    return redirect()->route('challenges.index')->with('success', 'Challenge created!');
}

public function show($id)
{
    $challenge = Challenge::findOrFail($id);
    return view('challenges.challenge_show', compact('challenge'));
}

public function edit($id)
{
    $challenge = Challenge::findOrFail($id);
    return view('challenges.challenge_edit', compact('challenge'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'points' => 'nullable|integer',
        'duration' => 'nullable|string',
    ]);
    
    $challenge = Challenge::findOrFail($id);
    $challenge->update($request->all());
    return redirect()->route('challenges.index')->with('success', 'Challenge updated!');
}

public function destroy($id)
{
    $challenge = Challenge::findOrFail($id);
    $challenge->delete();
    return redirect()->route('challenges.index')->with('success', 'Challenge deleted!');
}
}