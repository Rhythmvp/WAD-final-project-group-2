@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<div style="
    width: 100%;
    height: 350px;
    background-image: url('/images/hero.jpg'); 
    background-size: cover;
    background-position: center;
    border-radius: 12px;
    display: flex;
    align-items: flex-end;
    padding: 40px;
    color: white;
">
    <div>
        <h1 style="font-size: 48px; font-weight: 600; margin: 0;">Hello Charles!</h1>
        <p style="font-size: 18px; margin-top: 8px;">How’s your day in Telkom?</p>
    </div>
</div>


<!-- ABOUT US -->
<div class="card" style="margin-top: 40px; padding: 40px; display: flex; gap: 40px; align-items: center;">

    <img src="/images/about.jpg" 
        style="width: 220px; height: 220px; border-radius: 50%; object-fit: cover;">

    <div>
        <h2 style="font-size: 30px; font-weight: 600; margin-bottom: 15px; color:#1F3D1F;">
            ABOUT US
        </h2>

        <p style="line-height: 1.7;">
            TelUrMind is a digital platform created to help students improve their mental 
            and physical wellbeing. We focus on wellness, mindset, healthy lifestyle 
            challenges, and building supportive campus communities.
        </p>
    </div>
</div>


<!-- OUR SERVICES -->
<h2 style="font-size: 32px; margin-top: 60px; margin-bottom: 20px; font-weight: 600; color:#1F3D1F;">
    Our Services
</h2>

<div style="display: flex; gap: 25px;">

    <!-- Service 1 -->
    <div class="card" style="flex: 1;">
        <h3 style="font-size: 22px; font-weight: 600;">Healthy Challenges</h3>
        <p style="margin-top: 10px; line-height: 1.6;">
            Weekly lifestyle challenges to help you stay active and build healthy habits.
        </p>
        <a href="/challenges" class="btn" style="margin-top: 15px; display: inline-block;">View More</a>
    </div>

    <!-- Service 2 -->
    <div class="card" style="flex: 1;">
        <h3 style="font-size: 22px; font-weight: 600;">Peer Consultation Forum</h3>
        <p style="margin-top: 10px; line-height: 1.6;">
            Share your thoughts, get peer support, and join meaningful discussions.
        </p>
        <a href="/forum" class="btn" style="margin-top: 15px; display: inline-block;">View More</a>
    </div>

    <!-- Service 3 -->
    <div class="card" style="flex: 1;">
        <h3 style="font-size: 22px; font-weight: 600;">Campus Clinics</h3>
        <p style="margin-top: 10px; line-height: 1.6;">
            Find mental health clinics available in the campus environment.
        </p>
        <a href="/clinics" class="btn" style="margin-top: 15px; display: inline-block;">View More</a>
    </div>

</div>


<!-- CONTACT SECTION -->
<div class="card" style="margin-top: 60px; padding: 40px;">
    <h2 style="font-size: 28px; font-weight: 600;">Contact Us</h2>
    <p style="margin-top: 10px;">
        Email: telurmind.support@student.telkomuniversity.ac.id
    </p>
</div>

@endsection
