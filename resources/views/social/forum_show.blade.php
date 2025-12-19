@extends('layouts.app')

@section('content')

<div class="card" style="max-width:800px; margin:auto;">

    {{-- TITLE --}}
    <h1 style="margin-bottom:10px; font-size:28px;">
        {{ $post->title }}
    </h1>

    {{-- META INFO --}}
    <p style="color:#6c757d; margin-bottom:20px;">
        <strong>Category:</strong> {{ $post->category }} <br>
        <span style="font-size:14px;">
            Posted {{ $post->created_at->diffForHumans() }}
        </span>
    </p>

    {{-- DIVIDER --}}
    <hr style="margin:20px 0;">

    {{-- MESSAGE --}}
    <p style="font-size:16px; line-height:1.7;">
        {{ $post->message }}
    </p>

    {{-- ACTIONS --}}
    <div style="margin-top:30px; display:flex; gap:15px; flex-wrap:wrap;">

        {{-- EDIT (OWNER OR ADMIN) --}}
        @if(auth()->id() === $post->user_id || auth()->user()->isAdmin())
            <a href="{{ route('forum.edit', $post->id) }}" class="btn">
                Edit
            </a>
        @endif

        {{-- BACK --}}
        <a href="{{ route('forum.index') }}" class="btn" style="background:#e0e0e0; color:#333;">
            Back to Forum
        </a>

        {{-- DELETE --}}
        @if(auth()->id() === $post->user_id || auth()->user()->isAdmin())
            <form action="{{ route('forum.destroy', $post->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="btn"
                        style="background:#f44336;">
                    Delete Post
                </button>
            </form>
        @endif
    </div>
</div>

@endsection
