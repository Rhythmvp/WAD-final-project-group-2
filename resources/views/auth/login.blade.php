@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 480px; margin: 3rem auto;">
    <div class="card" style="background: var(--bg-white, #FFFFFF); padding: 3rem; box-shadow: var(--shadow-md); border-radius: var(--radius-xl, 20px); border: 1px solid var(--border-light, #E0E7ED);">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">🧠</div>
            <h1 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); color: var(--primary-blue, #6B9BD1); margin-bottom: 0.5rem;">
                Welcome Back
            </h1>
            <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-base, 1rem);">
                Sign in to your TelU Mind account
            </p>
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
                    <input type="checkbox" name="remember" style="margin-right: 0.5rem; accent-color: var(--primary-blue, #6B9BD1);">
                    <span style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-sm, 0.875rem);">Remember me</span>
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: var(--font-lg, 1.125rem); background: var(--primary-blue, #6B9BD1);">
                Sign In
            </button>
        </form>

        <div style="margin-top: 2rem; text-align: center; padding-top: 2rem; border-top: 1px solid var(--border-light, #E0E7ED);">
            <p style="color: var(--text-muted, #8B9AAB); margin: 0; font-size: var(--font-sm, 0.875rem);">
                Don't have an account? 
                <a href="{{ route('register') }}" style="color: var(--primary-blue, #6B9BD1); font-weight: var(--font-semibold, 600); text-decoration: none; border-bottom: 1px solid transparent; transition: border-color var(--transition-normal);">
                    Create one here
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
