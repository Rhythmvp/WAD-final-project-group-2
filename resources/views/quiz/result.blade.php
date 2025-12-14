@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 2rem auto;">
    <div style="text-align: center; margin-bottom: 3rem;">
        <h1 style="font-size: var(--font-4xl); font-weight: var(--font-bold); color: var(--primary-purple); margin-bottom: 0.5rem;">
            📊 Assessment Results
        </h1>
        <p style="color: var(--text-secondary); font-size: var(--font-base);">
            {{ now()->format('F d, Y') }}
        </p>
    </div>

    <div class="card" style="margin-bottom: 2rem; padding: 3rem;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="display: inline-block; padding: 2rem; background: var(--gradient-main); border-radius: var(--radius-full); margin-bottom: 1rem; box-shadow: var(--shadow-lg);">
                <span style="font-size: var(--font-4xl); font-weight: var(--font-bold); color: white;">{{ $score }}</span>
            </div>
            <p style="color: var(--text-secondary); font-size: var(--font-lg); font-weight: var(--font-semibold);">
                Total Score
            </p>
        </div>

        <div style="border-top: 2px solid var(--border-light); padding-top: 2rem;">
            <h2 style="font-size: var(--font-2xl); font-weight: var(--font-bold); margin-bottom: 1.5rem; color: var(--primary-purple);">
                🤖 AI-Powered Insights
            </h2>
            <div style="background: var(--bg-light-gray); padding: 2rem; border-radius: var(--radius-md); line-height: 1.8; color: var(--text-primary);">
                {!! nl2br(e($aiResponse)) !!}
            </div>
        </div>
    </div>

    <div class="alert alert-info" style="margin-bottom: 2rem;">
        <h3 style="font-size: var(--font-lg); font-weight: var(--font-semibold); margin-bottom: 0.5rem;">
            ⚠️ Important Note
        </h3>
        <p style="margin: 0; line-height: 1.7;">
            This assessment provides general guidance and is not a professional diagnosis. 
            If you're experiencing distress or mental health concerns, please reach out to a 
            qualified mental health professional or contact a crisis helpline.
        </p>
    </div>

    <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 3rem; flex-wrap: wrap;">
        <a href="{{ route('quiz.index') }}" 
           class="btn btn-primary"
           style="padding: 1rem 2rem; min-width: 180px;">
            Take Another Assessment
        </a>
        <a href="{{ route('quiz.history') }}" 
           class="btn btn-secondary"
           style="padding: 1rem 2rem; min-width: 180px;">
            View History
        </a>
        <a href="{{ route('home') }}" 
           class="btn"
           style="padding: 1rem 2rem; background: var(--bg-light-gray); color: var(--text-primary); min-width: 180px;">
            Back to Home
        </a>
    </div>

    <div style="margin-top: 3rem;">
        <h3 style="font-size: var(--font-xl); font-weight: var(--font-bold); margin-bottom: 1.5rem; text-align: center; color: var(--text-primary);">
            🆘 Crisis Resources
        </h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
            <div class="card" style="text-align: center; padding: 1.5rem;">
                <div style="font-size: 2rem; margin-bottom: 0.5rem;">📞</div>
                <p style="font-weight: var(--font-semibold); margin-bottom: 0.5rem; color: var(--text-primary);">
                    National Crisis Line
                </p>
                <p style="color: var(--text-secondary); font-size: var(--font-lg);">
                    988 (US)
                </p>
            </div>
            <div class="card" style="text-align: center; padding: 1.5rem;">
                <div style="font-size: 2rem; margin-bottom: 0.5rem;">💬</div>
                <p style="font-weight: var(--font-semibold); margin-bottom: 0.5rem; color: var(--text-primary);">
                    Crisis Text Line
                </p>
                <p style="color: var(--text-secondary); font-size: var(--font-lg);">
                    Text HOME to 741741
                </p>
            </div>
            <div class="card" style="text-align: center; padding: 1.5rem;">
                <div style="font-size: 2rem; margin-bottom: 0.5rem;">🌍</div>
                <p style="font-weight: var(--font-semibold); margin-bottom: 0.5rem; color: var(--text-primary);">
                    International Help
                </p>
                <p style="color: var(--text-secondary); font-size: var(--font-lg);">
                    findahelpline.com
                </p>
            </div>
        </div>
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
