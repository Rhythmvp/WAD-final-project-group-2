@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-serif mb-2">Mental Health Assessment</h1>
        <p class="text-gray-600">Answer honestly to receive personalized AI-powered insights</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('quiz.submit') }}" method="POST" id="quizForm">
            @csrf

            @foreach($questions as $index => $question)
            <div class="mb-8 pb-8 border-b border-gray-200 last:border-0">
                <p class="text-lg mb-4 font-medium">{{ $index + 1 }}. {{ $question->question }}</p>
                
                <div class="space-y-3">
                    @for($i = 1; $i <= 5; $i++)
                    <label class="flex items-center p-3 rounded-lg hover:bg-[#f0f4ed] cursor-pointer transition">
                        <input type="radio" 
                               name="answers[{{ $question->id }}]" 
                               value="{{ $i }}" 
                               class="mr-3 w-5 h-5 text-[#c4d5b8]"
                               required>
                        <span class="text-gray-700">
                            @if($i === 1) Never
                            @elseif($i === 2) Rarely
                            @elseif($i === 3) Sometimes
                            @elseif($i === 4) Often
                            @else Always
                            @endif
                        </span>
                    </label>
                    @endfor
                </div>

                @error('answers.' . $question->id)
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            @endforeach

            @if($questions->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-500">No questions available at this time.</p>
            </div>
            @else
            <div class="flex justify-center gap-4 mt-8">
                <button type="submit" 
                        class="px-8 py-3 bg-[#5a6c4f] text-white rounded-full hover:bg-[#4a5c3f] transition text-lg">
                    Submit Assessment
                </button>
                <a href="{{ route('quiz.history') }}" 
                   class="px-8 py-3 bg-[#c4d5b8] rounded-full hover:bg-[#b0c5a4] transition text-lg">
                    View History
                </a>
            </div>
            @endif
        </form>
    </div>

    <div class="mt-6 text-center text-sm text-gray-500">
        <p>This assessment is for informational purposes only and is not a substitute for professional medical advice.</p>
    </div>
</div>
@endsection