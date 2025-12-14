@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 450px; margin: 2rem auto;">
    <div class="card" style="background: var(--bg-white); padding: 3rem; box-shadow: var(--shadow-lg); border-radius: var(--radius-xl);">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="font-size: var(--font-3xl); font-weight: var(--font-bold); color: var(--primary-purple); margin-bottom: 0.5rem;">
                🧠 Join TelU Mind
            </h1>
            <p style="color: var(--text-secondary); font-size: var(--font-base);">Create your account and start your wellness journey</p>
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

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: var(--font-lg);">
                Create Account
            </button>
        </form>

        <div style="margin-top: 2rem; text-align: center; padding-top: 2rem; border-top: 1px solid var(--border-light);">
            <p style="color: var(--text-muted); margin: 0;">
                Already have an account? 
                <a href="{{ route('login') }}" style="color: var(--primary-purple); font-weight: var(--font-semibold); text-decoration: none;">
                    Sign in here
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
