<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TelU Mind - Campus Wellness Platform</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Design System CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Additional Styles -->
    <style>
        body {
            font-family: var(--font-primary, 'Poppins', sans-serif);
            background-color: var(--bg-main, #f5f7fa);
            color: var(--text-primary, #333333);
        }

        .navbar {
            background: var(--bg-white, #ffffff);
            padding: var(--space-4, 1rem) var(--space-8, 2rem);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-sm, 0 2px 5px rgba(0, 0, 0, 0.1));
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: var(--font-2xl, 1.5rem);
            font-weight: var(--font-bold, 700);
            color: var(--primary-purple, #667eea);
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: var(--space-4, 1rem);
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar-nav a {
            color: var(--text-secondary, #555555);
            font-weight: var(--font-medium, 500);
            text-decoration: none;
            padding: var(--space-2, 0.5rem) var(--space-4, 1rem);
            border-radius: var(--radius-md, 8px);
            transition: all 0.3s ease;
        }

        .navbar-nav a:hover {
            color: var(--primary-purple, #667eea);
            background: var(--bg-light-gray, #fafbfc);
        }

        .container {
            width: 90%;
            max-width: var(--max-width-xl, 1200px);
            margin: auto;
            padding: var(--space-8, 2rem) var(--space-4, 1rem);
        }

        .page-title {
            font-size: var(--font-3xl, 2rem);
            font-weight: var(--font-bold, 700);
            margin-bottom: var(--space-6, 1.5rem);
            color: var(--text-primary, #333333);
        }

        /* Success/Error Messages */
        .alert {
            padding: var(--space-4, 1rem);
            border-radius: var(--radius-md, 8px);
            margin-bottom: var(--space-4, 1rem);
            border-left: 4px solid;
        }

        .alert-success {
            background: var(--success-bg, #e8f5e9);
            color: var(--success-text, #2e7d32);
            border-left-color: var(--success-border, #4caf50);
        }

        .alert-error {
            background: var(--error-bg, #ffebee);
            color: var(--error-text, #c62828);
            border-left-color: var(--error-border, #f44336);
        }

        .alert-info {
            background: var(--info-bg, #e3f2fd);
            color: var(--info-text, #1565c0);
            border-left-color: var(--info-border, #2196f3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: var(--space-3, 0.75rem) var(--space-4, 1rem);
            }

            .navbar-nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: var(--space-2, 0.5rem);
            }

            .container {
                width: 95%;
                padding: var(--space-4, 1rem) var(--space-2, 0.5rem);
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ route('home') }}" class="navbar-brand">🧠 TelU Mind</a>
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
                        <button type="submit" style="background: none; border: none; color: var(--error, #f44336); cursor: pointer; font-weight: var(--font-medium, 500); padding: var(--space-2, 0.5rem) var(--space-4, 1rem); border-radius: var(--radius-md, 8px); transition: all 0.3s ease;">
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}" class="btn btn-primary" style="color: white;">Register</a></li>
            @endauth
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer style="background: var(--bg-white, #ffffff); padding: var(--space-8, 2rem); text-align: center; color: var(--text-muted, #888888); margin-top: var(--space-12, 3rem); border-top: 1px solid var(--border-light, #e0e0e0);">
        <p>&copy; {{ date('Y') }} TelU Mind - Campus Wellness Platform. All rights reserved.</p>
    </footer>
</body>
</html>
