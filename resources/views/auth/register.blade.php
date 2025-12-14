@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 480px; margin: 3rem auto;">
    <div class="card" style="background: var(--bg-white, #FFFFFF); padding: 3rem; box-shadow: var(--shadow-md); border-radius: var(--radius-xl, 20px); border: 1px solid var(--border-light, #E0E7ED);">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">🧠</div>
            <h1 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); color: var(--primary-blue, #6B9BD1); margin-bottom: 0.5rem;">
                Join TelU Mind
            </h1>
            <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-base, 1rem);">
                Create your account and start your wellness journey
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div style="margin-bottom: 1.5rem;">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
                       required 
                       autofocus
                       class="form-input"
                       placeholder="Enter your full name">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       required
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
                       placeholder="Create a password (min. 8 characters)">
            </div>

            <div style="margin-bottom: 2rem;">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       required
                       class="form-input"
                       placeholder="Confirm your password">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: var(--font-lg, 1.125rem); background: var(--primary-blue, #6B9BD1);">
                Create Account
            </button>
        </form>

        <div style="margin-top: 2rem; text-align: center; padding-top: 2rem; border-top: 1px solid var(--border-light, #E0E7ED);">
            <p style="color: var(--text-muted, #8B9AAB); margin: 0; font-size: var(--font-sm, 0.875rem);">
                Already have an account? 
                <a href="{{ route('login') }}" style="color: var(--primary-blue, #6B9BD1); font-weight: var(--font-semibold, 600); text-decoration: none; border-bottom: 1px solid transparent; transition: border-color var(--transition-normal);">
                    Sign in here
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
