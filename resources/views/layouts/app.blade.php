<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TelU Mind - Campus Wellness Platform</title>

    <!-- Google Font - Poppins (Clean, Modern) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Design System CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Additional Styles -->
    <style>
        body {
            font-family: var(--font-primary, 'Poppins', sans-serif);
            background: var(--bg-main, #F8F9FA);
            color: var(--text-primary, #2C3E50);
            min-height: 100vh;
        }

        .navbar {
            background: var(--bg-white, #FFFFFF);
            padding: var(--space-4, 1rem) var(--space-8, 2rem);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--border-light);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .navbar-brand {
            font-size: var(--font-2xl, 1.5rem);
            font-weight: var(--font-bold, 700);
            color: var(--primary-blue, #6B9BD1);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: var(--space-2);
            transition: all var(--transition-normal);
        }

        .navbar-brand:hover {
            color: var(--primary-dark, #4A7BA7);
            transform: scale(1.02);
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: var(--space-2, 0.5rem);
            list-style: none;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
        }

        .navbar-nav a,
        .navbar-nav button {
            color: var(--text-secondary, #5A6C7D);
            font-weight: var(--font-medium, 500);
            text-decoration: none;
            padding: var(--space-2, 0.5rem) var(--space-4, 1rem);
            border-radius: var(--radius-md, 12px);
            transition: all var(--transition-normal);
            font-size: var(--font-sm, 0.875rem);
            border: none;
            background: none;
            cursor: pointer;
            font-family: inherit;
        }

        .navbar-nav a:hover,
        .navbar-nav button:hover {
            color: var(--primary-blue, #6B9BD1);
            background: var(--bg-soft, #E8F4F8);
        }

        .navbar-nav .btn-primary {
            background: var(--primary-blue, #6B9BD1);
            color: white;
            padding: var(--space-2, 0.5rem) var(--space-5, 1.25rem);
        }

        .navbar-nav .btn-primary:hover {
            background: var(--primary-dark, #4A7BA7);
            color: white;
        }

        .container {
            width: 90%;
            max-width: var(--max-width-xl, 1200px);
            margin: 0 auto;
            padding: var(--space-8, 2rem) var(--space-4, 1rem);
        }

        .page-title {
            font-size: var(--font-3xl, 2rem);
            font-weight: var(--font-bold, 700);
            margin-bottom: var(--space-6, 1.5rem);
            color: var(--text-primary, #2C3E50);
            line-height: 1.3;
        }

        /* Alert Messages - Soothing */
        .alert {
            padding: var(--space-4, 1rem) var(--space-5, 1.25rem);
            border-radius: var(--radius-md, 12px);
            margin-bottom: var(--space-4, 1rem);
            border-left: 4px solid;
            line-height: 1.6;
            animation: fadeIn 0.3s ease-out;
        }

        .alert-success {
            background: var(--success-bg, #E8F5E9);
            color: var(--success-text, #2E7D32);
            border-left-color: var(--success-border, #66BB6A);
        }

        .alert-error {
            background: var(--error-bg, #FFEBEE);
            color: var(--error-text, #C62828);
            border-left-color: var(--error-border, #EF9A9A);
        }

        .alert-info {
            background: var(--info-bg, #E3F2FD);
            color: var(--info-text, #1565C0);
            border-left-color: var(--info-border, #90CAF9);
        }

        .alert-warning {
            background: var(--warning-bg, #FFF8E1);
            color: var(--warning-text, #F57C00);
            border-left-color: var(--warning-border, #FFB74D);
        }

        /* Footer - Subtle, Professional */
        footer {
            background: var(--bg-white, #FFFFFF);
            padding: var(--space-8, 2rem);
            text-align: center;
            color: var(--text-muted, #8B9AAB);
            margin-top: var(--space-12, 3rem);
            border-top: 1px solid var(--border-light, #E0E7ED);
            font-size: var(--font-sm, 0.875rem);
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Loading Animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .loading {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: var(--space-3, 0.75rem) var(--space-4, 1rem);
                gap: var(--space-3);
            }

            .navbar-nav {
                justify-content: center;
                gap: var(--space-1, 0.25rem);
                width: 100%;
            }

            .navbar-nav a,
            .navbar-nav button {
                padding: var(--space-2, 0.5rem) var(--space-3, 0.75rem);
                font-size: var(--font-xs, 0.75rem);
            }

            .container {
                width: 95%;
                padding: var(--space-4, 1rem) var(--space-2, 0.5rem);
            }

            .page-title {
                font-size: var(--font-2xl, 1.5rem);
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ route('home') }}" class="navbar-brand">
            <span style="font-size: 1.75rem;">🧠</span>
            <span>TelU Mind</span>
        </a>
        <ul class="navbar-nav">
            <li><a href="{{ route('home') }}">Home</a></li>
            @auth
                <li><a href="{{ route('challenges.index') }}">Challenges</a></li>
                <li><a href="{{ route('clinics.index') }}">Clinics</a></li>
                <li><a href="{{ route('quiz.index') }}">Quiz</a></li>
                <li><a href="{{ route('diary.index') }}">Diary</a></li>
                <li><a href="{{ route('forum.index') }}">Forum</a></li>
                @if(auth()->user()->isAdmin())
                    <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="color: var(--error, #E57373);">
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}" class="btn btn-primary">Register</a></li>
            @endauth
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <strong>✓</strong> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <strong>⚠</strong> {{ session('error') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                <strong>ℹ</strong> {{ session('info') }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer style="width: 100%; box-sizing: border-box; padding: 2rem; background: var(--bg-white, #FFFFFF); border-top: 1px solid var(--border-light, #E0E7ED); text-align: center; color: var(--text-muted, #8B9AAB);">
        <p style="margin: 0;">&copy; {{ date('Y') }} TelU Mind - Campus Wellness Platform. All rights reserved.</p>
        <p style="margin: var(--space-2, 0.5rem) 0 0 0; font-size: var(--font-xs, 0.75rem); opacity: 0.8;">
            Supporting student mental health and wellbeing
        </p>
    </footer>
</body>
</html>
