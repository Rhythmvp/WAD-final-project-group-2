@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 0 auto;">
    <div class="card" style="padding: 30px; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.08);">

        <h1 style="margin-bottom: 20px;">Edit Discussion</h1>

        <form action="{{ route('forum.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label><strong>Title</strong></label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $post->title) }}" 
                    required
                    style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc;"
                >
            </div>

            <div style="margin-bottom: 15px;">
                <label><strong>Category</strong></label>
                <select 
                    name="category" 
                    style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc;"
                >
                    <option value="Stress & Academics" {{ $post->category == 'Stress & Academics' ? 'selected' : '' }}>
                        Stress & Academics
                    </option>
                    <option value="Mental Health" {{ $post->category == 'Mental Health' ? 'selected' : '' }}>
                        Mental Health
                    </option>
                    <option value="Lifestyle" {{ $post->category == 'Lifestyle' ? 'selected' : '' }}>
                        Lifestyle
                    </option>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label><strong>Message</strong></label>
                <textarea 
                    name="message" 
                    rows="5"
                    style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc;"
                >{{ old('message', $post->message) }}</textarea>
            </div>

            <div style="display:flex; gap:10px;">
                <button 
                    type="submit"
                    style="padding:10px 18px; background:#6B9BD1; color:white; border:none; border-radius:8px;"
                >
                    Update Post
                </button>

                <a 
                    href="{{ route('forum.index') }}"
                    style="padding:10px 18px; border-radius:8px; background:#eee; text-decoration:none; color:#333;"
                >
                    Cancel
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
