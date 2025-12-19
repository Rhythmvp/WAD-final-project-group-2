<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
        $entries = Diary::where('user_id', auth()->id())->latest()->get();
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

        Diary::create([
            'entry' => $request->entry,
            'mood' => $request->mood,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('diary.index')->with('success', 'Diary entry saved!');
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
        
        // Ensure user can only update their own entries
        if ($entry->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $entry->update([
            'entry' => $request->entry,
            'mood' => $request->mood,
        ]);

        return redirect()->route('diary.index')->with('success', 'Entry updated!');
    }

    public function destroy($id)
    {
        $entry = Diary::findOrFail($id);
        
        // Ensure user can only delete their own entries
        if ($entry->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $entry->delete();
        return redirect()->route('diary.index')->with('success', 'Entry deleted!');
    }

    
}
