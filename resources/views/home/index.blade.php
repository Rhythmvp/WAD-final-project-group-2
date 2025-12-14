@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<div style="
    width: 100%;
    min-height: 550px;
    background: var(--gradient-main, linear-gradient(135deg, #A8D5E2 0%, #7FB3A8 50%, #B8D4C1 100%));
    border-radius: var(--radius-xl, 20px);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 4rem;
    margin-bottom: 3rem;
    box-shadow: var(--shadow-soft, 0 2px 12px rgba(127, 179, 168, 0.1));
    position: relative;
    overflow: hidden;
">
    <!-- Background Pattern - Subtle -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.05; background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    
    <div style="flex: 1; z-index: 1; color: var(--text-primary, #2C3E50);">
        <h1 style="font-size: var(--font-4xl, 2.5rem); font-weight: var(--font-bold, 700); margin: 0 0 1rem 0; line-height: 1.2; color: var(--text-primary, #2C3E50);">
            Welcome to TelU Mind
        </h1>
        <p style="font-size: var(--font-xl, 1.25rem); margin: 0 0 2rem 0; color: var(--text-secondary, #5A6C7D); line-height: 1.6;">
            Your comprehensive campus wellness platform for mental health, physical fitness, and community support.
        </p>
        @auth
            <div style="background: rgba(255, 255, 255, 0.7); padding: 1.5rem; border-radius: var(--radius-md, 12px); backdrop-filter: blur(10px);">
                <p style="font-size: var(--font-lg, 1.125rem); margin: 0; color: var(--text-primary, #2C3E50); font-weight: var(--font-medium, 500);">
                    Hello, {{ auth()->user()->name }}! 👋
                </p>
                <p style="font-size: var(--font-sm, 0.875rem); margin: 0.5rem 0 0 0; color: var(--text-secondary, #5A6C7D);">
                    Ready to continue your wellness journey?
                </p>
            </div>
        @else
            <div style="display: flex; gap: 1rem; margin-top: 2rem; flex-wrap: wrap;">
                <a href="{{ route('register') }}" class="btn btn-primary" style="background: var(--primary-blue, #6B9BD1); color: white; padding: 1rem 2rem; font-size: var(--font-lg, 1.125rem); box-shadow: var(--shadow-sm);">
                    Get Started
                </a>
                <a href="{{ route('login') }}" class="btn btn-secondary" style="background: rgba(255, 255, 255, 0.9); color: var(--primary-blue, #6B9BD1); border: 2px solid var(--primary-blue, #6B9BD1); padding: 1rem 2rem; font-size: var(--font-lg, 1.125rem);">
                    Sign In
                </a>
            </div>
        @endauth
    </div>
    
    <div style="flex: 1; display: flex; justify-content: center; align-items: center; z-index: 1; padding-left: 2rem;">
        <div style="position: relative;">
            <img src="{{ asset('mental-health-awareness-concept_52683-37916.avif') }}" 
                 alt="Mental Health Awareness"
                 style="max-width: 100%; height: auto; border-radius: var(--radius-xl, 20px); box-shadow: var(--shadow-lg, 0 8px 32px rgba(107, 155, 209, 0.16)); border: 4px solid rgba(255, 255, 255, 0.5);">
            <div style="position: absolute; top: -10px; right: -10px; width: 60px; height: 60px; background: var(--primary-light, #A8D5E2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; box-shadow: var(--shadow-md);">
                ✨
            </div>
        </div>
    </div>
</div>

<!-- ABOUT US -->
<div class="card" style="margin-bottom: 3rem; display: flex; gap: 3rem; align-items: center; flex-wrap: wrap; background: var(--bg-white, #FFFFFF); border: 1px solid var(--border-light, #E0E7ED);">
    <div style="flex: 1; min-width: 300px;">
        <div style="display: inline-block; padding: 0.5rem 1rem; background: var(--bg-soft, #E8F4F8); border-radius: var(--radius-full, 9999px); margin-bottom: 1rem; color: var(--primary-blue, #6B9BD1); font-size: var(--font-sm, 0.875rem); font-weight: var(--font-semibold, 600);">
            About Us
        </div>
        <h2 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); margin-bottom: 1rem; color: var(--text-primary, #2C3E50);">
            Supporting Your Wellness Journey
        </h2>
        <p style="line-height: 1.8; color: var(--text-secondary, #5A6C7D); font-size: var(--font-lg, 1.125rem); margin-bottom: 1.5rem;">
            TelU Mind is a digital platform created to help students improve their mental 
            and physical wellbeing. We focus on wellness, mindset, healthy lifestyle 
            challenges, and building supportive campus communities.
        </p>
        <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
            <div style="text-align: center;">
                <div style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); color: var(--primary-blue, #6B9BD1); margin-bottom: 0.25rem;">1000+</div>
                <div style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-sm, 0.875rem);">Active Users</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); color: var(--secondary-teal, #7FB3A8); margin-bottom: 0.25rem;">24/7</div>
                <div style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-sm, 0.875rem);">Support Available</div>
            </div>
        </div>
    </div>
    
    <div style="flex: 1; min-width: 300px; display: flex; justify-content: center;">
        <div style="width: 100%; max-width: 400px; height: 300px; background: var(--gradient-soft, linear-gradient(135deg, #E8F4F8 0%, #F0F8F4 100%)); border-radius: var(--radius-xl, 20px); display: flex; align-items: center; justify-content: center; font-size: var(--font-4xl, 2.5rem); border: 2px solid var(--border-light, #E0E7ED); box-shadow: var(--shadow-sm);">
            🧠
        </div>
    </div>
</div>

<!-- OUR SERVICES -->
<div style="margin-bottom: 3rem;">
    <div style="text-align: center; margin-bottom: 3rem;">
        <div style="display: inline-block; padding: 0.5rem 1rem; background: var(--bg-soft, #E8F4F8); border-radius: var(--radius-full, 9999px); margin-bottom: 1rem; color: var(--primary-blue, #6B9BD1); font-size: var(--font-sm, 0.875rem); font-weight: var(--font-semibold, 600);">
            Our Services
        </div>
        <h2 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); margin-bottom: 0.5rem; color: var(--text-primary, #2C3E50);">
            Comprehensive Wellness Support
        </h2>
        <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-base, 1rem); max-width: 600px; margin: 0 auto;">
            Explore our range of services designed to support your mental, physical, and social wellbeing
        </p>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <!-- Service 1 - Mind -->
        <div class="card" style="text-align: center; border-top: 4px solid var(--mind-primary, #9B8FB8); background: linear-gradient(to bottom, var(--mind-light, #E8E3F0) 0%, var(--bg-white, #FFFFFF) 20%);">
            <div style="font-size: 3.5rem; margin-bottom: 1rem; filter: drop-shadow(0 2px 4px rgba(155, 143, 184, 0.2));">🧘</div>
            <h3 style="font-size: var(--font-2xl, 1.5rem); font-weight: var(--font-bold, 700); margin-bottom: 1rem; color: var(--text-primary, #2C3E50);">
                Mental Health
            </h3>
            <p style="line-height: 1.7; color: var(--text-secondary, #5A6C7D); margin-bottom: 1.5rem; font-size: var(--font-base, 1rem);">
                Access mental health assessments, journaling tools, and resources to support your emotional wellbeing.
            </p>
            @auth
                <a href="{{ route('diary.index') }}" class="btn btn-primary" style="background: var(--mind-primary, #9B8FB8);">Explore</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary" style="background: var(--mind-primary, #9B8FB8);">Get Started</a>
            @endauth
        </div>

        <!-- Service 2 - Body -->
        <div class="card" style="text-align: center; border-top: 4px solid var(--body-primary, #E8A87C); background: linear-gradient(to bottom, var(--body-light, #FFF4ED) 0%, var(--bg-white, #FFFFFF) 20%);">
            <div style="font-size: 3.5rem; margin-bottom: 1rem; filter: drop-shadow(0 2px 4px rgba(232, 168, 124, 0.2));">💪</div>
            <h3 style="font-size: var(--font-2xl, 1.5rem); font-weight: var(--font-bold, 700); margin-bottom: 1rem; color: var(--text-primary, #2C3E50);">
                Physical Health
            </h3>
            <p style="line-height: 1.7; color: var(--text-secondary, #5A6C7D); margin-bottom: 1.5rem; font-size: var(--font-base, 1rem);">
                Join healthy challenges, track your progress, and find campus clinics for physical wellness support.
            </p>
            @auth
                <a href="{{ route('challenges.index') }}" class="btn btn-primary" style="background: var(--body-primary, #E8A87C);">Explore</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary" style="background: var(--body-primary, #E8A87C);">Get Started</a>
            @endauth
        </div>

        <!-- Service 3 - Connect -->
        <div class="card" style="text-align: center; border-top: 4px solid var(--connect-primary, #7FB3A8); background: linear-gradient(to bottom, var(--connect-light, #E8F4F0) 0%, var(--bg-white, #FFFFFF) 20%);">
            <div style="font-size: 3.5rem; margin-bottom: 1rem; filter: drop-shadow(0 2px 4px rgba(127, 179, 168, 0.2));">🤝</div>
            <h3 style="font-size: var(--font-2xl, 1.5rem); font-weight: var(--font-bold, 700); margin-bottom: 1rem; color: var(--text-primary, #2C3E50);">
                Community Support
            </h3>
            <p style="line-height: 1.7; color: var(--text-secondary, #5A6C7D); margin-bottom: 1.5rem; font-size: var(--font-base, 1rem);">
                Connect with peers, share experiences, and get support through our community forum and peer consultation.
            </p>
            @auth
                <a href="{{ route('forum.index') }}" class="btn btn-primary" style="background: var(--connect-primary, #7FB3A8);">Explore</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary" style="background: var(--connect-primary, #7FB3A8);">Get Started</a>
            @endauth
        </div>
    </div>
</div>

<!-- FEATURES GRID -->
@auth
<div style="margin-bottom: 3rem;">
    <h2 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); margin-bottom: 2rem; text-align: center; color: var(--text-primary, #2C3E50);">
        Quick Access
    </h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
        <a href="{{ route('quiz.index') }}" class="card" style="text-decoration: none; color: inherit; text-align: center; padding: 2rem; transition: all var(--transition-normal);">
            <div style="font-size: 2.5rem; margin-bottom: 1rem;">📝</div>
            <h4 style="font-weight: var(--font-semibold, 600); margin-bottom: 0.5rem; color: var(--text-primary, #2C3E50);">Mental Health Quiz</h4>
            <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-sm, 0.875rem);">Take assessment</p>
        </a>
        
        <a href="{{ route('clinics.index') }}" class="card" style="text-decoration: none; color: inherit; text-align: center; padding: 2rem; transition: all var(--transition-normal);">
            <div style="font-size: 2.5rem; margin-bottom: 1rem;">🏥</div>
            <h4 style="font-weight: var(--font-semibold, 600); margin-bottom: 0.5rem; color: var(--text-primary, #2C3E50);">Campus Clinics</h4>
            <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-sm, 0.875rem);">Find support</p>
        </a>
        
        <a href="{{ route('challenges.index') }}" class="card" style="text-decoration: none; color: inherit; text-align: center; padding: 2rem; transition: all var(--transition-normal);">
            <div style="font-size: 2.5rem; margin-bottom: 1rem;">🎯</div>
            <h4 style="font-weight: var(--font-semibold, 600); margin-bottom: 0.5rem; color: var(--text-primary, #2C3E50);">Challenges</h4>
            <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-sm, 0.875rem);">Join activities</p>
        </a>
    </div>
</div>
@endauth

<!-- CONTACT SECTION -->
<div class="card" style="background: var(--bg-soft, #E8F4F8); text-align: center; padding: 3rem; border: 1px solid var(--border-light, #E0E7ED);">
    <div style="font-size: 2.5rem; margin-bottom: 1rem;">💬</div>
    <h2 style="font-size: var(--font-3xl, 2rem); font-weight: var(--font-bold, 700); margin-bottom: 1rem; color: var(--text-primary, #2C3E50);">
        Need Help?
    </h2>
    <p style="color: var(--text-secondary, #5A6C7D); font-size: var(--font-lg, 1.125rem); margin-bottom: 1.5rem; line-height: 1.6;">
        We're here to support you on your wellness journey
    </p>
    <p style="color: var(--text-primary, #2C3E50); font-size: var(--font-base, 1rem);">
        📧 <a href="mailto:telurmind.support@student.telkomuniversity.ac.id" style="color: var(--primary-blue, #6B9BD1); text-decoration: none; font-weight: var(--font-semibold, 600); border-bottom: 2px solid var(--primary-light, #A8D5E2); padding-bottom: 2px; transition: all var(--transition-normal);">
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
            padding-left: 0 !important;
        }
        
        .card {
            padding: 1.5rem !important;
        }
    }
</style>
@endsection
