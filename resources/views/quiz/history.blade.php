@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1000px; margin: 2rem auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
        <h1 style="font-size: var(--font-3xl); font-weight: var(--font-bold); color: var(--text-primary); margin: 0;">
            📊 Assessment History
        </h1>
        <a href="{{ route('quiz.index') }}" 
           class="btn btn-primary"
           style="padding: 0.75rem 1.5rem;">
            New Assessment
        </a>
    </div>

    @if($results->isEmpty())
    <div class="card" style="text-align: center; padding: 4rem;">
        <div style="font-size: 4rem; margin-bottom: 1rem;">📝</div>
        <p style="color: var(--text-secondary); font-size: var(--font-lg); margin-bottom: 2rem;">
            You haven't taken any assessments yet.
        </p>
        <a href="{{ route('quiz.index') }}" 
           class="btn btn-primary"
           style="padding: 1rem 2rem; font-size: var(--font-lg);">
            Take Your First Assessment
        </a>
    </div>
    @else
    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        @foreach($results as $result)
        <div class="card" style="transition: transform 0.3s ease, box-shadow 0.3s ease;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='var(--shadow-lg)'"
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-md)'">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <p style="color: var(--text-secondary); font-size: var(--font-sm); margin-bottom: 0.25rem;">
                        {{ $result->created_at->format('F d, Y \a\t g:i A') }}
                    </p>
                    <p style="color: var(--text-muted); font-size: var(--font-xs);">
                        {{ $result->created_at->diffForHumans() }}
                    </p>
                </div>
                <div style="text-align: center; padding: 1rem 1.5rem; background: var(--gradient-main); border-radius: var(--radius-full); min-width: 100px;">
                    <span style="font-size: var(--font-2xl); font-weight: var(--font-bold); color: white;">{{ $result->total_score }}</span>
                    <p style="font-size: var(--font-xs); color: white; opacity: 0.9; margin-top: 0.25rem;">Score</p>
                </div>
            </div>

            <div style="border-top: 2px solid var(--border-light); padding-top: 1.5rem;">
                <p style="font-size: var(--font-base); font-weight: var(--font-semibold); margin-bottom: 1rem; color: var(--text-primary);">
                    🤖 AI Insights:
                </p>
                <div style="background: var(--bg-light-gray); padding: 1.5rem; border-radius: var(--radius-md); margin-bottom: 1rem;">
                    <p style="color: var(--text-secondary); line-height: 1.7; margin: 0;">
                        {{ Str::limit($result->ai_response, 200) }}
                    </p>
                </div>
            </div>

            <div style="margin-top: 1rem;">
                <button onclick="toggleDetails({{ $result->id }})" 
                        style="color: var(--primary-purple); font-size: var(--font-sm); font-weight: var(--font-medium); background: none; border: none; cursor: pointer; text-decoration: underline; padding: 0;">
                    {{ $detailsVisible[$result->id] ?? false ? 'Hide' : 'View' }} Full Response
                </button>
            </div>

            <div id="details-{{ $result->id }}" style="display: none; margin-top: 1.5rem; border-top: 2px solid var(--border-light); padding-top: 1.5rem;">
                <p style="color: var(--text-primary); line-height: 1.8; white-space: pre-line; margin: 0;">
                    {{ $result->ai_response }}
                </p>
            </div>
        </div>
        @endforeach
    </div>

    <div style="margin-top: 2rem; display: flex; justify-content: center;">
        {{ $results->links() }}
    </div>
    @endif
</div>

<script>
function toggleDetails(id) {
    const details = document.getElementById('details-' + id);
    const button = event.target;
    
    if (details.style.display === 'none') {
        details.style.display = 'block';
        button.textContent = 'Hide Full Response';
    } else {
        details.style.display = 'none';
        button.textContent = 'View Full Response';
    }
}
</script>

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
