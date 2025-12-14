@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 2rem auto;">
    <div style="text-align: center; margin-bottom: 3rem;">
        <div style="font-size: 3rem; margin-bottom: 1rem;">🧠</div>
        <h1 style="font-size: var(--font-4xl, 2.5rem); font-weight: var(--font-bold, 700); color: var(--primary-blue, #6B9BD1); margin-bottom: 0.5rem;">
            Mental Health Assessment
        </h1>
        <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-lg, 1.125rem); line-height: 1.6;">
            Answer honestly to receive personalized AI-powered insights
        </p>
    </div>

    <div class="card" style="padding: 3rem; background: var(--bg-white, #FFFFFF); border: 1px solid var(--border-light, #E0E7ED);">
        <form action="{{ route('quiz.submit') }}" method="POST" id="quizForm">
            @csrf

            @foreach($questions as $index => $question)
            <div style="margin-bottom: 3rem; padding-bottom: 2rem; border-bottom: 2px solid var(--border-light, #E0E7ED); {{ $loop->last ? 'border-bottom: none;' : '' }}">
                <p style="font-size: var(--font-xl, 1.25rem); font-weight: var(--font-semibold, 600); color: var(--text-primary, #2C3E50); margin-bottom: 1.5rem; line-height: 1.5;">
                    <span style="display: inline-block; width: 32px; height: 32px; background: var(--primary-blue, #6B9BD1); color: white; border-radius: 50%; text-align: center; line-height: 32px; margin-right: 0.75rem; font-size: var(--font-sm, 0.875rem); font-weight: var(--font-bold, 700);">{{ $index + 1 }}</span>
                    {{ $question->question }}
                </p>
                
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    @for($i = 1; $i <= 5; $i++)
                    <label style="display: flex; align-items: center; padding: 1rem 1.25rem; border-radius: var(--radius-md, 12px); cursor: pointer; transition: all var(--transition-normal, 0.3s ease); border: 2px solid var(--border-light, #E0E7ED); background: var(--bg-white, #FFFFFF);"
                           onmouseover="this.style.background='var(--bg-soft, #E8F4F8)'; this.style.borderColor='var(--primary-blue, #6B9BD1)'; this.style.transform='translateX(4px)'"
                           onmouseout="this.style.background='var(--bg-white, #FFFFFF)'; this.style.borderColor='var(--border-light, #E0E7ED)'; this.style.transform='translateX(0)'">
                        <input type="radio" 
                               name="answers[{{ $question->id }}]" 
                               value="{{ $i }}" 
                               required
                               style="margin-right: 1rem; width: 20px; height: 20px; accent-color: var(--primary-blue, #6B9BD1); cursor: pointer;">
                        <span style="color: var(--text-primary, #2C3E50); font-size: var(--font-base, 1rem); flex: 1; font-weight: var(--font-medium, 500);">
                            @if($i === 1) Never
                            @elseif($i === 2) Rarely
                            @elseif($i === 3) Sometimes
                            @elseif($i === 4) Often
                            @else Always
                            @endif
                        </span>
                    </label>
                    @endfor
                </div>

                @error('answers.' . $question->id)
                    <p style="color: var(--error, #E57373); font-size: var(--font-sm, 0.875rem); margin-top: 0.5rem; padding-left: 2.5rem;">{{ $message }}</p>
                @enderror
            </div>
            @endforeach

            @if($questions->isEmpty())
            <div style="text-align: center; padding: 3rem;">
                <div style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;">📝</div>
                <p style="color: var(--text-muted, #8B9AAB); font-size: var(--font-lg, 1.125rem); margin-bottom: 1.5rem;">
                    No questions available at this time. Please check back later.
                </p>
                <a href="{{ route('home') }}" class="btn btn-primary" style="margin-top: 1.5rem;">
                    Back to Home
                </a>
            </div>
            @else
            <div style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem; flex-wrap: wrap;">
                <button type="submit" 
                        class="btn btn-primary"
                        style="padding: 1rem 2.5rem; font-size: var(--font-lg, 1.125rem); min-width: 200px; background: var(--primary-blue, #6B9BD1);">
                    Submit Assessment
                </button>
                <a href="{{ route('quiz.history') }}" 
                   class="btn btn-secondary"
                   style="padding: 1rem 2.5rem; font-size: var(--font-lg, 1.125rem); min-width: 200px;">
                    View History
                </a>
            </div>
            @endif
        </form>
    </div>

    <div style="margin-top: 2rem; text-align: center; padding: 1.5rem; background: var(--info-bg, #E3F2FD); border-radius: var(--radius-md, 12px); border-left: 4px solid var(--info-border, #90CAF9);">
        <p style="color: var(--info-text, #1565C0); font-size: var(--font-sm, 0.875rem); margin: 0; line-height: 1.6;">
            ⚠️ This assessment is for informational purposes only and is not a substitute for professional medical advice.
        </p>
    </div>
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
