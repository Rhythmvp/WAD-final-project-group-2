@extends('layouts.app')

@section('content')
@php
    $userJoined = auth()->user()->challenges()->where('challenge_id', $challenge->id)->first();
@endphp

<div class="container py-5">
    <div class="row">
        <div class="col-md-7">
            <h1 class="fw-bold">{{ $challenge->name }}</h1>
            <p class="text-muted">{{ $challenge->description }}</p>
            </div>

        <div class="col-md-5">
            <div class="card p-4 shadow-sm">
                @if($userJoined)
                    <div class="text-center" style="font-size: 20px;">
                        <h5 class="fw-bold" style="font-size: 25px; margin-top: 0rem; margin-bottom: 0.5rem">Water Tracker</h5>
                        
                        @php
                            $targetGelas = 56; 
                            $gelasSekarang = round(($userJoined->pivot->progress / 100) * $targetGelas);
                        @endphp

                        <div class="display-4 fw-bold text-primary my-3">
                            {{ $gelasSekarang }} <span class="fs-4 text-muted">/ {{ $targetGelas }}</span>
                        </div>

                        <form action="{{ route('challenges.updateProgress', $challenge->id) }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center justify-content-center gap-3 mb-4">
                                <button type="button" class="btn btn-outline-primary" style="padding: 12px 15px; margin-top: 2rem;" onclick="updateGelas(-1)">-</button>
                                
                                <input type="number" style="font-size: 18px" name="current_glasses" id="glassInput" 
                                       value="{{ $gelasSekarang }}" 
                                       class="form-control text-center fw-bold w-25" readonly>
                                
                                <button type="button" class="btn btn-outline-primary" style="padding: 12px 15px; margin-bottom: 2rem;" onclick="updateGelas(1)">+</button>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold" style="padding: 12px 15px;">UPDATE PROGRESS</button>
                        </form>
                    </div>
                @else
                    <div class="text-center">
                        <p>You haven't joined this challenge yet.</p>
                        <form action="{{ route('challenges.join', $challenge->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">JOIN CHALLENGE</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function updateGelas(tambah) {
        const input = document.getElementById('glassInput');
        let nilai = parseInt(input.value) + tambah;
        if (nilai >= 0 && nilai <= 20) {
            input.value = nilai;
        }
    }
</script>
@endsection