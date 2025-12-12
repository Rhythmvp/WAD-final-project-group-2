@extends('layouts.app')

@section('content')

<!-- PAGE HEADER -->
<h1 style="font-size: 40px; font-weight: 700; color:#1F3D1F; margin-bottom: 20px;">
    Peer Consultation Forum
</h1>

<p style="font-size: 18px; margin-bottom: 40px;">
    What is Peer Consultation Forum?
</p>

<!-- TOP DESCRIPTION BANNER -->
<div class="card" style="padding: 30px; margin-bottom: 40px;">
    <p style="line-height: 1.7;">
        Our Peer Consultation Forum is a safe and supportive space where students can share
        their concerns, discuss personal challenges, get emotional support,
        and connect with others facing similar experiences.
    </p>
</div>


<!-- DISCUSSION CATEGORIES TITLE -->
<h2 style="font-size: 26px; font-weight: 700; color:#1F3D1F; margin-bottom: 20px;">
    Discussion Categories
</h2>

<!-- DISCUSSION GRID -->
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">

    <!-- Start a discussion -->
    <a href="{{ route('forum.create') }}" class="card forum-card">
        <h3>Start a Discussion</h3>
        <p>Create a new topic to discuss.</p>
    </a>

    <!-- Featured Discussions -->
    <a href="{{ route('forum.featured') }}" class="card forum-card">
        <h3>Featured Discussions</h3>
        <p>Highlighted topics chosen by moderators.</p>
    </a>

    <!-- General Topics -->
    <a href="{{ route('forum.general') }}" class="card forum-card">
        <h3>General Discussions</h3>
        <p>Talk about anything related to lifestyle & wellbeing.</p>
    </a>
</div>


<!-- LIST OF LATEST POSTS -->
<h2 style="font-size: 26px; font-weight: 700; color:#1F3D1F; margin-top: 50px;">
    Recent Discussions
</h2>

@foreach($posts as $post)
<div class="card" style="margin-top: 20px;">
    <h3 style="font-size: 22px; font-weight: 600; margin-bottom: 10px;">
        {{ $post->title }}
    </h3>

    <p style="margin-bottom: 8px; color: #444;">{{ $post->description }}</p>

    <small style="color: #6b6b6b;">
        Posted by: {{ $post->author }} • {{ $post->created_at->diffForHumans() }}
    </small>

    <div style="margin-top: 15px;">
        <a href="{{ route('forum.show', $post->id) }}" class="btn">View Discussion</a>
    </div>
</div>
@endforeach

@endsection
