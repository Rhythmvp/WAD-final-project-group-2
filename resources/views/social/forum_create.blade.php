@extends('layouts.app')

@section('content')

<div class="card">
    <h1 style="margin-bottom:20px;">Create a New Discussion</h1>

    {{-- 🔴 SHOW VALIDATION ERRORS (VERY IMPORTANT) --}}
    @if ($errors->any())
        <div style="background:#fdecea; color:#b71c1c; padding:15px; border-radius:8px; margin-bottom:20px;">
            <ul style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('forum.store') }}" method="POST">
        @csrf

        {{-- TITLE --}}
        <div style="margin-bottom: 15px;">
            <label style="font-weight:500;">Title</label>
            <input 
                type="text" 
                name="title" 
                value="{{ old('title') }}"
                required 
                style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc;"
            >
        </div>

        {{-- CATEGORY --}}
        <div style="margin-bottom: 15px;">
            <label style="font-weight:500;">Category</label>
            <select 
                name="category" 
                style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc;"
                required
            >
                <option value="">-- Choose Category --</option>
                <option value="Stress & Academics" {{ old('category') == 'Stress & Academics' ? 'selected' : '' }}>
                    Stress & Academics
                </option>
                <option value="Mental Health" {{ old('category') == 'Mental Health' ? 'selected' : '' }}>
                    Mental Health
                </option>
                <option value="Lifestyle" {{ old('category') == 'Lifestyle' ? 'selected' : '' }}>
                    Lifestyle
                </option>
            </select>
        </div>

        {{-- MESSAGE --}}
        <div style="margin-bottom: 20px;">
            <label style="font-weight:500;">Message</label>
            <textarea 
                name="message" 
                rows="5" 
                required
                style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc;"
            >{{ old('message') }}</textarea>
        </div>

        {{-- ACTIONS --}}
        <button type="submit" class="btn">
            Create Discussion
        </button>

        <a href="{{ route('forum.index') }}" style="margin-left:15px;">
            Back
        </a>
    </form>
</div>

@endsection
