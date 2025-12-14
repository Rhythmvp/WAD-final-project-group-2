@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1000px; margin: 2rem auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
        <div>
            <h1 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); color: var(--text-primary, #2C3E50); margin-bottom: 0.5rem;">
                📝 My Diary
            </h1>
            <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-base, 1rem);">
                Your personal space for thoughts and reflections
            </p>
        </div>
        <a href="{{ route('diary.create') }}" class="btn btn-primary" style="padding: 0.875rem 1.75rem;">
            ➕ New Entry
        </a>
    </div>

    @if($entries->count() == 0)
    <div class="card" style="text-align: center; padding: 4rem; background: var(--bg-soft, #E8F4F8); border: 2px dashed var(--border-medium, #D1D9E0);">
        <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;">📔</div>
        <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-lg, 1.125rem); margin-bottom: 1.5rem;">
            No diary entries yet. Start writing your first entry!
        </p>
        <a href="{{ route('diary.create') }}" class="btn btn-primary">
            Write Your First Entry
        </a>
    </div>
    @else
    <div style="display: grid; gap: 1.5rem;">
        @foreach($entries as $entry)
        <div class="card" style="padding: 2rem; transition: all var(--transition-normal); border-left: 4px solid var(--mind-primary, #9B8FB8);">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem; flex-wrap: wrap; gap: 1rem;">
                <div style="flex: 1;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <span style="font-size: 1.5rem;">
                            @if($entry->mood === 'excellent' || $entry->mood === 'very good') 😄
                            @elseif($entry->mood === 'good') 😊
                            @elseif($entry->mood === 'okay' || $entry->mood === 'neutral') 😐
                            @elseif($entry->mood === 'bad') 😕
                            @else 😢
                            @endif
                        </span>
                        <span style="padding: 0.375rem 0.875rem; background: var(--mind-light, #E8E3F0); color: var(--mind-primary, #9B8FB8); border-radius: var(--radius-full, 9999px); font-size: var(--font-sm, 0.875rem); font-weight: var(--font-semibold, 600); text-transform: capitalize;">
                            {{ $entry->mood }}
                        </span>
                    </div>
                    <p style="color: var(--text-primary, #2C3E50); line-height: 1.7; margin: 0; font-size: var(--font-base, 1rem);">
                        {{ Str::limit($entry->entry, 200) }}
                    </p>
                </div>
                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                    <a href="{{ route('diary.show', $entry->id) }}" class="btn btn-soft" style="padding: 0.5rem 1rem; font-size: var(--font-sm, 0.875rem);">
                        View
                    </a>
                    <a href="{{ route('diary.edit', $entry->id) }}" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: var(--font-sm, 0.875rem);">
                        Edit
                    </a>
                    <form action="{{ route('diary.destroy', $entry->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this entry?')"
                                class="btn"
                                style="padding: 0.5rem 1rem; font-size: var(--font-sm, 0.875rem); background: var(--error-bg, #FFEBEE); color: var(--error, #E57373); border: 1px solid var(--error-border, #EF9A9A);">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--border-light, #E0E7ED);">
                <p style="color: var(--text-muted, #8B9AAB); font-size: var(--font-xs, 0.75rem); margin: 0;">
                    {{ $entry->created_at->format('F d, Y \a\t g:i A') }} • {{ $entry->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<style>
    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }
        
        .card {
            padding: 1.5rem !important;
        }
    }
</style>
@endsection
