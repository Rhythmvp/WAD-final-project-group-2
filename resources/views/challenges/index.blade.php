@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 1400px;">
    <div class="header-wrapper d-flex flex-column align-items-center">
        <h1 class="display-5 fw-bold mb-3 text-center" style="color: #2C3E50; letter-spacing: -1px;">Healthy Lifestyle Challenges</h1>
        <p class="text-muted mb-4 text-center" style="font-size: 1.1rem; max-width: 600px;">
            Join a challenge today and start your journey to a healthier lifestyle!
        </p>
        
        <div class="search-bar">
            <span class="search-icon">🔍</span>
            <input type="text" id="searchInput" placeholder="Search " onkeyup="searchChallenges()">
        </div>
    </div>

    <div style="margin-top: 5vh;">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="challengeGrid">
            @foreach($challenges as $challenge)
                <div class="col challenge-card-item" data-name="{{ strtolower($challenge->name) }}">
                    <div class="card h-100 border-0 shadow-sm bg-white rounded-4 overflow-hidden p-3">
                        
                        <div class="img-container mb-3">
                            @if ($challenge->image_path)
                                <img src="{{ asset('storage/' . $challenge->image_path) }}" alt="{{ $challenge->name }}">
                            @else
                                <div class="placeholder-icon d-flex align-items-center justify-content-center bg-light h-100">
                                    <i class="bi bi-image text-muted fs-1"></i>
                                </div>
                            @endif
                        </div>

                        <div class="text-center d-flex flex-column h-100">
                            <h3 class="fw-bold text-dark mb-1" style="font-size: 1.5rem; letter-spacing: -0.5px;">
                                {{ $challenge->name }}
                            </h3>
                            
                            <p class="text-muted mb-0 small" style="line-height: 1.4;">
                                {{ Str::limit($challenge->description, 70) }}
                            </p>
                            
                            <div class="meta-data mb-3">
                                <span class="text-secondary fw-bold" style="font-size: 0.85rem;">
                                    {{ $challenge->duration_days }} Days | {{ $challenge->difficulty }}
                                </span>
                            </div>

                            <div class="mt-auto pt-2">
                                @php
                                    $userJoined = auth()->user()->challenges()->where('challenge_id', $challenge->id)->first();
                                @endphp

                                @if(!$userJoined)
                                    <form action="{{ route('challenges.join', $challenge->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-join-custom w-100 shadow-sm">
                                            JOIN CHALLENGE
                                        </button>
                                    </form>
                                @else
                                    <div class="progress-wrapper text-start p-2 rounded-3" style="background-color: #F8F9FF; border: 1px solid #E0E7FF;">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-bold text-dark small">My Progress</span>
                                            <span class="badge bg-success" style="font-size: 0.7rem;">{{ $userJoined->pivot->progress }}%</span>
                                        </div>
                                        <div class="progress" style="height: 8px; border-radius: 10px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                                                 role="progressbar" 
                                                 style="width: {{ $userJoined->pivot->progress }}%;">
                                            </div>
                                        </div>
                                        <div class="text-center mt-2">
                                            <a href="{{ route('challenges.show', $challenge) }}" class="small text-decoration-none fw-bold" style="color: #6A5AE0; font-size: 0.75rem;">
                                                Update Progress →
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    body {font-family: 'Poppins', sans-serif; background-color: #fbfbfb; }

    .search-bar {
        max-width: 1000px;
        margin: 0 auto 1rem;
        position: relative;
    }

    .search-bar input {
        width: 100%;
        padding: 1.1rem 1.5rem 1.1rem 3.5rem;
        border: 1px solid #d1d5db;
        border-radius: 50px;
        font-size: 1rem;
        font-family: 'poppins', sans-serif;
    }

    .search-bar input:focus {
        outline: none;
        border-color: #9ca3af;
    }

    .search-icon {
        position: absolute;
        left: 1.3rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.3rem;
    }

    .img-container {
        width: 100%;
        height: 180px;
        border-radius: 12px;
        overflow: hidden;
        background: #f0f0f0;
    }
    .img-container img { width: 100%; height: 100%; object-fit: cover; }

    .btn-join-custom {
        background-color: #6A5AE0;
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        transition: 0.3s;
        margin-top: 3vh;
    }
    .btn-join-custom:hover {
        background-color: #5649c0;
        transform: translateY(-2px);
    }

    .card { 
        transition: all 0.3s ease; border: 1px solid #f0f0f0 !important; }
    .card:hover { 
        transform: translateY(-8px); 
        box-shadow: 0 15px 30px rgba(0,0,0,0.08) !important; 
    }

    @media (min-width: 768px) {
        .row-cols-md-3 > * { width: 33.3333%; }
    }
</style>

<script>
function searchChallenges() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let cards = document.querySelectorAll('.challenge-card-item');
    cards.forEach(card => {
        let name = card.getAttribute('data-name');
        card.style.display = name.includes(input) ? '' : 'none';
    });
}
</script>
@endsection