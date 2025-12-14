@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 2rem auto;">
    <div style="text-align: center; margin-bottom: 3rem;">
        <h1 style="font-size: var(--font-4xl); font-weight: var(--font-bold); color: var(--primary-purple); margin-bottom: 0.5rem;">
            🧠 Mental Health Assessment
        </h1>
        <p style="color: var(--text-secondary); font-size: var(--font-lg);">
            Answer honestly to receive personalized AI-powered insights
        </p>
    </div>

    <div class="card" style="padding: 3rem;">
        <form action="{{ route('quiz.submit') }}" method="POST" id="quizForm">
            @csrf

            @foreach($questions as $index => $question)
            <div style="margin-bottom: 3rem; padding-bottom: 2rem; border-bottom: 2px solid var(--border-light); {{ $loop->last ? 'border-bottom: none;' : '' }}">
                <p style="font-size: var(--font-xl); font-weight: var(--font-semibold); color: var(--text-primary); margin-bottom: 1.5rem;">
                    {{ $index + 1 }}. {{ $question->question }}
                </p>
                
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    @for($i = 1; $i <= 5; $i++)
                    <label style="display: flex; align-items: center; padding: 1rem; border-radius: var(--radius-md); cursor: pointer; transition: all 0.3s ease; border: 2px solid var(--border-light); background: var(--bg-white);"
                           onmouseover="this.style.background='var(--bg-light-gray)'; this.style.borderColor='var(--primary-purple)'"
                           onmouseout="this.style.background='var(--bg-white)'; this.style.borderColor='var(--border-light)'">
                        <input type="radio" 
                               name="answers[{{ $question->id }}]" 
                               value="{{ $i }}" 
                               required
                               style="margin-right: 1rem; width: 20px; height: 20px; accent-color: var(--primary-purple); cursor: pointer;">
                        <span style="color: var(--text-primary); font-size: var(--font-base); flex: 1;">
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
                    <p style="color: var(--error); font-size: var(--font-sm); margin-top: 0.5rem;">{{ $message }}</p>
                @enderror
            </div>
            @endforeach

            @if($questions->isEmpty())
            <div style="text-align: center; padding: 3rem;">
                <p style="color: var(--text-muted); font-size: var(--font-lg);">
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
                        style="padding: 1rem 2.5rem; font-size: var(--font-lg); min-width: 200px;">
                    Submit Assessment
                </button>
                <a href="{{ route('quiz.history') }}" 
                   class="btn btn-secondary"
                   style="padding: 1rem 2.5rem; font-size: var(--font-lg); min-width: 200px;">
                    View History
                </a>
            </div>
            @endif
        </form>
    </div>

    <div style="margin-top: 2rem; text-align: center; padding: 1.5rem; background: var(--info-bg); border-radius: var(--radius-md); border-left: 4px solid var(--info-border);">
        <p style="color: var(--info-text); font-size: var(--font-sm); margin: 0;">
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
