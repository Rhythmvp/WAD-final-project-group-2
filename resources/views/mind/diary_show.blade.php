@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; margin: 2rem auto;">
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('diary.index') }}" class="btn btn-soft" style="padding: 0.75rem 1.5rem; margin-bottom: 1rem;">
            ← Back to Diary
        </a>
        <h1 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); color: var(--text-primary, #2C3E50); margin-bottom: 0.5rem;">
            📝 Diary Entry
        </h1>
        <p style="color: var(--text-muted, #8B9AAB); font-size: var(--font-sm, 0.875rem);">
            {{ $entry->created_at->format('F d, Y \a\t g:i A') }}
        </p>
    </div>

    <div class="card" style="padding: 3rem; background: var(--bg-white, #FFFFFF); border: 1px solid var(--border-light, #E0E7ED); border-left: 4px solid var(--mind-primary, #9B8FB8);">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem; padding-bottom: 1.5rem; border-bottom: 2px solid var(--border-light, #E0E7ED);">
            <span style="font-size: 2.5rem;">
                @if($entry->mood === 'excellent' || $entry->mood === 'very good') 😄
                @elseif($entry->mood === 'good') 😊
                @elseif($entry->mood === 'okay' || $entry->mood === 'neutral') 😐
                @elseif($entry->mood === 'bad') 😕
                @else 😢
                @endif
            </span>
            <div>
                <div style="font-size: var(--font-sm, 0.875rem); color: var(--text-muted, #8B9AAB); margin-bottom: 0.25rem;">Mood</div>
                <div style="font-size: var(--font-xl, 1.25rem); font-weight: var(--font-semibold, 600); color: var(--mind-primary, #9B8FB8); text-transform: capitalize;">
                    {{ $entry->mood }}
                </div>
            </div>
        </div>

        <div style="margin-bottom: 2rem;">
            <div style="font-size: var(--font-sm, 0.875rem); color: var(--text-muted, #8B9AAB); margin-bottom: 0.5rem; font-weight: var(--font-medium, 500);">Entry</div>
            <div style="color: var(--text-primary, #2C3E50); line-height: 1.8; font-size: var(--font-base, 1rem); white-space: pre-wrap;">
                {{ $entry->entry }}
            </div>
        </div>

        <div style="display: flex; gap: 1rem; flex-wrap: wrap; padding-top: 1.5rem; border-top: 1px solid var(--border-light, #E0E7ED);">
            <a href="{{ route('diary.edit', $entry->id) }}" class="btn btn-secondary" style="padding: 0.75rem 1.5rem;">
                Edit Entry
            </a>
            <form action="{{ route('diary.destroy', $entry->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Are you sure you want to delete this entry?')"
                        class="btn"
                        style="padding: 0.75rem 1.5rem; background: var(--error-bg, #FFEBEE); color: var(--error, #E57373); border: 1px solid var(--error-border, #EF9A9A);">
                    Delete Entry
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
