@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 450px; margin: 2rem auto;">
    <div class="card" style="background: var(--bg-white); padding: 3rem; box-shadow: var(--shadow-lg); border-radius: var(--radius-xl);">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="font-size: var(--font-3xl); font-weight: var(--font-bold); color: var(--primary-purple); margin-bottom: 0.5rem;">
                🧠 Welcome Back
            </h1>
            <p style="color: var(--text-secondary); font-size: var(--font-base);">Sign in to your TelU Mind account</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-error" style="margin-bottom: 1.5rem;">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom: 1.5rem;">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       required 
                       autofocus
                       class="form-input"
                       placeholder="Enter your email">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required
                       class="form-input"
                       placeholder="Enter your password">
            </div>

            <div style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input type="checkbox" name="remember" style="margin-right: 0.5rem;">
                    <span style="color: var(--text-secondary);">Remember me</span>
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: var(--font-lg);">
                Sign In
            </button>
        </form>

        <div style="margin-top: 2rem; text-align: center; padding-top: 2rem; border-top: 1px solid var(--border-light);">
            <p style="color: var(--text-muted); margin: 0;">
                Don't have an account? 
                <a href="{{ route('register') }}" style="color: var(--primary-purple); font-weight: var(--font-semibold); text-decoration: none;">
                    Create one here
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
