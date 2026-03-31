@extends('layouts.app')

@section('content')

<h1 class="page-title">Admin Dashboard</h1>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">

    <a href="#" class="admin-card">
        👤
        <span>Manage Users</span>
    </a>

    <a href="#" class="admin-card">
        💬
        <span>Manage Forum Posts</span>
    </a>

    <a href="{{ route('admin.challenges.index') }}" class="admin-card">
        🏆
        <span>Manage Challenges</span>
    </a>

    <a href="#" class="admin-card">
        🏥
        <span>Manage Clinics</span>
    </a>

    <a href="#" class="admin-card">
        📝
        <span>Manage Quiz</span>
    </a>

</div>

<style>
    .admin-card {
        background: white;
        padding: 30px 20px;
        border-radius: 16px;
        text-align: center;
        font-size: 1rem;
        font-weight: 600;
        color: #2C3E50;
        text-decoration: none;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        transition: all 0.25s ease;
        display: flex;
        flex-direction: column;
        gap: 12px;
        align-items: center;
    }

    .admin-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 30px rgba(0,0,0,0.08);
        background: #F4FAFF;
    }

    .admin-card span {
        font-size: 0.95rem;
    }
</style>

@endsection