<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::all();
        return view('admin.challenges.index', compact('challenges'));
    }

    public function show(Challenge $challenge)
    {
        return view('admin.challenges.show', compact('challenge'));
    }

    public function create()
    {
        return view('admin.challenges.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'goal' => 'required|string',
            'duration_days' => 'required|integer',
            'difficulty' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('images', 'public');
        }

        Challenge::create($validated);
        return redirect()->route('admin.challenges.index')
            ->with('success', 'Challenge added successfully!');
    }

    public function edit(Challenge $challenge)
    {
        return view('admin.challenges.edit', compact('challenge'));
    }

    public function update(Request $request, Challenge $challenge)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'goal' => 'required|string',
            'duration_days' => 'required|integer',
            'difficulty' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            if ($challenge->image_path) {
                Storage::disk('public')->delete($challenge->image_path);
            }
            $validated['image_path'] = $request->file('image_path')->store('images', 'public');
        }

        $challenge->update($validated);
        return redirect()->route('admin.challenges.index')
            ->with('success', 'Challenge updated successfully!');
    }
    
    public function destroy(Challenge $challenge)
    {
        if ($challenge->image_path) {
            Storage::disk('public')->delete($challenge->image_path);
        }
        
        $challenge->delete();
        return redirect()->route('admin.challenges.index')
            ->with('success', 'Challenge deleted successfully!');
    }

    public function join($id)
{
    $challenge = Challenge::findOrFail($id);
    $user = auth()->user();

    if (!$user->challenges()->where('challenge_id', $id)->exists()) {
        $user->challenges()->attach($id, [
            'progress' => 0,
            'status' => 'ongoing'
        ]);
    }

    return redirect()->back()->with('success', 'You have joined the challenge!');
}

    public function Studentindex()
    {
        $challenges = Challenge::all();
        return view('challenges.index', compact('challenges'));
    }

    public function Studentshow(Challenge $challenge)
    {
        return view('challenges.show', compact('challenge'));
    }

    public function updateProgress(Request $request, $id)
{
    $challenge = Challenge::findOrFail($id);
    $user = auth()->user();

    $request->validate([
        'current_glasses' => 'required|integer|min:0',
    ]);

    $targetGlasses = 56; 
    
    $percentage = ($request->current_glasses / $targetGlasses) * 100;
    
    if ($percentage > 100) $percentage = 100;

    $user->challenges()->updateExistingPivot($id, [
        'progress' => $percentage,
        'status' => $percentage >= 100 ? 'completed' : 'ongoing',
    ]);

    return redirect()->back()->with('success', 'You drank ' . $request->current_glasses . ' glasses today!');
}
}
