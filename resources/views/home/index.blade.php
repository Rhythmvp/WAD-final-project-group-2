@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<div style="
    width: 100%;
    min-height: 500px;
    background: var(--gradient-main, linear-gradient(135deg, #667eea 0%, #764ba2 100%));
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 4rem;
    margin-bottom: 3rem;
    box-shadow: var(--shadow-lg);
    position: relative;
    overflow: hidden;
">
    <!-- Background Pattern -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.1; background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23ffffff\" fill-opacity=\"1\"><circle cx=\"30\" cy=\"30\" r=\"2\"/></g></svg>');"></div>
    
    <div style="flex: 1; z-index: 1; color: white;">
        <h1 style="font-size: var(--font-4xl); font-weight: var(--font-bold); margin: 0 0 1rem 0; line-height: 1.2;">
            Welcome to TelU Mind
        </h1>
        <p style="font-size: var(--font-xl); margin: 0 0 2rem 0; opacity: 0.95;">
            Your comprehensive campus wellness platform for mental health, physical fitness, and community support.
        </p>
        @auth
            <p style="font-size: var(--font-lg); margin: 0; opacity: 0.9;">
                Hello, {{ auth()->user()->name }}! 👋
            </p>
        @else
            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <a href="{{ route('register') }}" class="btn btn-primary" style="background: white; color: var(--primary-purple); padding: 1rem 2rem; font-size: var(--font-lg);">
                    Get Started
                </a>
                <a href="{{ route('login') }}" class="btn btn-secondary" style="background: transparent; border: 2px solid white; color: white; padding: 1rem 2rem; font-size: var(--font-lg);">
                    Sign In
                </a>
            </div>
        @endauth
    </div>
    
    <div style="flex: 1; display: flex; justify-content: center; align-items: center; z-index: 1;">
        <img src="{{ asset('mental-health-awareness-concept_52683-37916.avif') }}" 
             alt="Mental Health Awareness"
             style="max-width: 100%; height: auto; border-radius: var(--radius-xl); box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
    </div>
</div>

<!-- ABOUT US -->
<div class="card" style="margin-bottom: 3rem; display: flex; gap: 3rem; align-items: center; flex-wrap: wrap;">
    <div style="flex: 1; min-width: 300px;">
        <h2 style="font-size: var(--font-3xl); font-weight: var(--font-bold); margin-bottom: 1rem; color: var(--text-primary);">
            About Us
        </h2>
        <p style="line-height: 1.8; color: var(--text-secondary); font-size: var(--font-lg); margin-bottom: 1.5rem;">
            TelU Mind is a digital platform created to help students improve their mental 
            and physical wellbeing. We focus on wellness, mindset, healthy lifestyle 
            challenges, and building supportive campus communities.
        </p>
        <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
            <div>
                <div style="font-size: var(--font-3xl); font-weight: var(--font-bold); color: var(--primary-purple);">1000+</div>
                <div style="color: var(--text-secondary);">Active Users</div>
            </div>
            <div>
                <div style="font-size: var(--font-3xl); font-weight: var(--font-bold); color: var(--primary-purple);">24/7</div>
                <div style="color: var(--text-secondary);">Support Available</div>
            </div>
        </div>
    </div>
    
    <div style="flex: 1; min-width: 300px; display: flex; justify-content: center;">
        <div style="width: 100%; max-width: 400px; height: 300px; background: var(--gradient-main); border-radius: var(--radius-xl); display: flex; align-items: center; justify-content: center; color: white; font-size: var(--font-4xl);">
            🧠
        </div>
    </div>
</div>

<!-- OUR SERVICES -->
<div style="margin-bottom: 3rem;">
    <h2 style="font-size: var(--font-3xl); font-weight: var(--font-bold); margin-bottom: 2rem; text-align: center; color: var(--text-primary);">
        Our Services
    </h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <!-- Service 1 - Mind -->
        <div class="card" style="text-align: center; transition: transform 0.3s ease; border-top: 4px solid var(--mind-primary);">
            <div style="font-size: 3rem; margin-bottom: 1rem;">🧘</div>
            <h3 style="font-size: var(--font-2xl); font-weight: var(--font-bold); margin-bottom: 1rem; color: var(--text-primary);">
                Mental Health
            </h3>
            <p style="line-height: 1.7; color: var(--text-secondary); margin-bottom: 1.5rem;">
                Access mental health assessments, journaling tools, and resources to support your emotional wellbeing.
            </p>
            @auth
                <a href="{{ route('diary.index') }}" class="btn btn-primary">Explore</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
            @endauth
        </div>

        <!-- Service 2 - Body -->
        <div class="card" style="text-align: center; transition: transform 0.3s ease; border-top: 4px solid var(--body-primary);">
            <div style="font-size: 3rem; margin-bottom: 1rem;">💪</div>
            <h3 style="font-size: var(--font-2xl); font-weight: var(--font-bold); margin-bottom: 1rem; color: var(--text-primary);">
                Physical Health
            </h3>
            <p style="line-height: 1.7; color: var(--text-secondary); margin-bottom: 1.5rem;">
                Join healthy challenges, track your progress, and find campus clinics for physical wellness support.
            </p>
            @auth
                <a href="{{ route('challenges.index') }}" class="btn" style="background: var(--body-primary); color: white;">Explore</a>
            @else
                <a href="{{ route('register') }}" class="btn" style="background: var(--body-primary); color: white;">Get Started</a>
            @endauth
        </div>

        <!-- Service 3 - Connect -->
        <div class="card" style="text-align: center; transition: transform 0.3s ease; border-top: 4px solid var(--connect-primary);">
            <div style="font-size: 3rem; margin-bottom: 1rem;">🤝</div>
            <h3 style="font-size: var(--font-2xl); font-weight: var(--font-bold); margin-bottom: 1rem; color: var(--text-primary);">
                Community Support
            </h3>
            <p style="line-height: 1.7; color: var(--text-secondary); margin-bottom: 1.5rem;">
                Connect with peers, share experiences, and get support through our community forum and peer consultation.
            </p>
            @auth
                <a href="{{ route('forum.index') }}" class="btn" style="background: var(--connect-primary); color: white;">Explore</a>
            @else
                <a href="{{ route('register') }}" class="btn" style="background: var(--connect-primary); color: white;">Get Started</a>
            @endauth
        </div>
    </div>
</div>

<!-- FEATURES GRID -->
@auth
<div style="margin-bottom: 3rem;">
    <h2 style="font-size: var(--font-3xl); font-weight: var(--font-bold); margin-bottom: 2rem; text-align: center; color: var(--text-primary);">
        Quick Access
    </h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
        <a href="{{ route('quiz.index') }}" class="card" style="text-decoration: none; color: inherit; text-align: center; padding: 2rem;">
            <div style="font-size: 2.5rem; margin-bottom: 1rem;">📝</div>
            <h4 style="font-weight: var(--font-semibold); margin-bottom: 0.5rem;">Mental Health Quiz</h4>
            <p style="color: var(--text-secondary); font-size: var(--font-sm);">Take assessment</p>
        </a>
        
        <a href="{{ route('clinics.index') }}" class="card" style="text-decoration: none; color: inherit; text-align: center; padding: 2rem;">
            <div style="font-size: 2.5rem; margin-bottom: 1rem;">🏥</div>
            <h4 style="font-weight: var(--font-semibold); margin-bottom: 0.5rem;">Campus Clinics</h4>
            <p style="color: var(--text-secondary); font-size: var(--font-sm);">Find support</p>
        </a>
        
        <a href="{{ route('challenges.index') }}" class="card" style="text-decoration: none; color: inherit; text-align: center; padding: 2rem;">
            <div style="font-size: 2.5rem; margin-bottom: 1rem;">🎯</div>
            <h4 style="font-weight: var(--font-semibold); margin-bottom: 0.5rem;">Challenges</h4>
            <p style="color: var(--text-secondary); font-size: var(--font-sm);">Join activities</p>
        </a>
    </div>
</div>
@endauth

<!-- CONTACT SECTION -->
<div class="card" style="background: var(--bg-light-gray); text-align: center; padding: 3rem;">
    <h2 style="font-size: var(--font-3xl); font-weight: var(--font-bold); margin-bottom: 1rem; color: var(--text-primary);">
        Need Help?
    </h2>
    <p style="color: var(--text-secondary); font-size: var(--font-lg); margin-bottom: 1.5rem;">
        We're here to support you on your wellness journey
    </p>
    <p style="color: var(--text-primary); font-size: var(--font-base);">
        📧 <a href="mailto:telurmind.support@student.telkomuniversity.ac.id" style="color: var(--primary-purple); text-decoration: none; font-weight: var(--font-semibold);">
            telurmind.support@student.telkomuniversity.ac.id
        </a>
    </p>
</div>

<style>
    @media (max-width: 768px) {
        .container > div:first-child {
            flex-direction: column !important;
            padding: 2rem !important;
            min-height: auto !important;
        }
        
        .container > div:first-child > div:last-child {
            margin-top: 2rem;
        }
        
        .card {
            padding: 1.5rem !important;
        }
    }
</style>
@endsection
