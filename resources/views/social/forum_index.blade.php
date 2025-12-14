@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1200px; margin: 2rem auto;">
    <!-- PAGE HEADER -->
    <div style="margin-bottom: 3rem;">
        <div style="display: inline-block; padding: 0.5rem 1rem; background: var(--connect-light, #E8F4F0); border-radius: var(--radius-full, 9999px); margin-bottom: 1rem; color: var(--connect-primary, #7FB3A8); font-size: var(--font-sm, 0.875rem); font-weight: var(--font-semibold, 600);">
            Community Forum
        </div>
        <h1 style="font-size: var(--font-4xl, 2.5rem); font-weight: var(--font-bold, 700); color: var(--text-primary, #2C3E50); margin-bottom: 0.5rem;">
            Peer Consultation Forum
        </h1>
        <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-lg, 1.125rem); line-height: 1.6;">
            A safe and supportive space to share, connect, and support each other
        </p>
    </div>

    <!-- TOP DESCRIPTION BANNER -->
    <div class="card" style="padding: 2.5rem; margin-bottom: 3rem; background: var(--connect-light, #E8F4F0); border-left: 4px solid var(--connect-primary, #7FB3A8);">
        <p style="line-height: 1.8; color: var(--text-primary, #2C3E50); font-size: var(--font-base, 1rem); margin: 0;">
            Our Peer Consultation Forum is a safe and supportive space where students can share
            their concerns, discuss personal challenges, get emotional support,
            and connect with others facing similar experiences.
        </p>
    </div>

    <!-- CREATE POST BUTTON -->
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('forum.create') }}" class="btn btn-primary" style="background: var(--connect-primary, #7FB3A8); padding: 1rem 2rem; font-size: var(--font-lg, 1.125rem);">
            ➕ Start a New Discussion
        </a>
    </div>

    <!-- LIST OF LATEST POSTS -->
    <div style="margin-bottom: 2rem;">
        <h2 style="font-size: var(--font-2xl, 1.5rem); font-weight: var(--font-bold, 700); color: var(--text-primary, #2C3E50); margin-bottom: 1.5rem;">
            Recent Discussions
        </h2>
    </div>

    @if($posts->count() == 0)
    <div class="card" style="text-align: center; padding: 4rem; background: var(--bg-soft, #E8F4F8); border: 2px dashed var(--border-medium, #D1D9E0);">
        <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;">💬</div>
        <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-lg, 1.125rem); margin-bottom: 1.5rem;">
            No discussions yet. Be the first to start a conversation!
        </p>
        <a href="{{ route('forum.create') }}" class="btn btn-primary" style="background: var(--connect-primary, #7FB3A8);">
            Start First Discussion
        </a>
    </div>
    @else
    <div style="display: grid; gap: 1.5rem;">
        @foreach($posts as $post)
        <div class="card forum-card" style="padding: 2rem; border-left: 4px solid var(--connect-primary, #7FB3A8);">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem; flex-wrap: wrap; gap: 1rem;">
                <div style="flex: 1;">
                    <h3 style="font-size: var(--font-xl, 1.25rem); font-weight: var(--font-bold, 700); margin-bottom: 0.75rem; color: var(--text-primary, #2C3E50);">
                        {{ $post->title }}
                    </h3>
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; flex-wrap: wrap;">
                        <span style="padding: 0.375rem 0.875rem; background: var(--bg-soft, #E8F4F8); color: var(--connect-primary, #7FB3A8); border-radius: var(--radius-full, 9999px); font-size: var(--font-xs, 0.75rem); font-weight: var(--font-semibold, 600); text-transform: capitalize;">
                            {{ $post->category }}
                        </span>
                    </div>
                    <p style="color: var(--text-secondary, #5A6C7D); line-height: 1.7; margin-bottom: 1rem; font-size: var(--font-base, 1rem);">
                        {{ Str::limit($post->message ?? '', 150) }}
                    </p>
                    <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                        <span style="color: var(--text-muted, #8B9AAB); font-size: var(--font-sm, 0.875rem);">
                            👤 {{ $post->user->name ?? 'Anonymous' }}
                        </span>
                        <span style="color: var(--text-muted, #8B9AAB); font-size: var(--font-sm, 0.875rem);">
                            • {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('forum.show', $post->id) }}" class="btn btn-primary" style="background: var(--connect-primary, #7FB3A8); padding: 0.75rem 1.5rem;">
                        View Discussion
                    </a>
                </div>
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
