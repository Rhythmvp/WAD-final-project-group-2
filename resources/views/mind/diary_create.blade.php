@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 700px; margin: 2rem auto;">
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); color: var(--text-primary, #2C3E50); margin-bottom: 0.5rem;">
            📝 Write New Entry
        </h1>
        <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-base, 1rem);">
            Express your thoughts and track your mood
        </p>
    </div>

    <div class="card" style="padding: 2.5rem; background: var(--bg-white, #FFFFFF); border: 1px solid var(--border-light, #E0E7ED);">
        <form action="{{ route('diary.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 1.5rem;">
                <label for="mood" class="form-label">How are you feeling today?</label>
                <select name="mood" 
                        id="mood" 
                        required
                        class="form-input"
                        style="cursor: pointer;">
                    <option value="">Select your mood...</option>
                    <option value="excellent">😄 Excellent</option>
                    <option value="good">😊 Good</option>
                    <option value="okay">😐 Okay</option>
                    <option value="bad">😕 Bad</option>
                    <option value="very bad">😢 Very Bad</option>
                </select>
                @error('mood')
                    <p style="color: var(--error, #E57373); font-size: var(--font-sm, 0.875rem); margin-top: 0.5rem;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 2rem;">
                <label for="entry" class="form-label">Your Entry</label>
                <textarea name="entry" 
                          id="entry" 
                          rows="10" 
                          required
                          class="form-input"
                          placeholder="Write about your day, thoughts, feelings, or anything you'd like to remember..."
                          style="resize: vertical; min-height: 200px; font-family: var(--font-primary);"></textarea>
                @error('entry')
                    <p style="color: var(--error, #E57373); font-size: var(--font-sm, 0.875rem); margin-top: 0.5rem;">{{ $message }}</p>
                @enderror
            </div>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <button type="submit" class="btn btn-primary" style="background: var(--mind-primary, #9B8FB8); padding: 1rem 2rem;">
                    Save Entry
                </button>
                <a href="{{ route('diary.index') }}" class="btn btn-soft" style="padding: 1rem 2rem;">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
