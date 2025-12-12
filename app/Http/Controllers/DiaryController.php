<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
        $entries = Diary::latest()->get();
        return view('mind.diary_index', compact('entries'));
    }

    public function create()
    {
        return view('mind.diary_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'entry' => 'required',
            'mood' => 'required',
        ]);

        Diary::create($request->all());
        return redirect('/diary')->with('success', 'Diary entry saved!');
    }

    public function show($id)
    {
        $entry = Diary::findOrFail($id);
        return view('mind.diary_show', compact('entry'));
    }

    public function edit($id)
    {
        $entry = Diary::findOrFail($id);
        return view('mind.diary_edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'entry' => 'required',
            'mood' => 'required',
        ]);

        $entry = Diary::findOrFail($id);
        $entry->update($request->all());

        return redirect('/diary')->with('success', 'Entry updated!');
    }

    public function destroy($id)
    {
        Diary::findOrFail($id)->delete();
        return redirect('/diary')->with('success', 'Entry deleted!');
    }
}
