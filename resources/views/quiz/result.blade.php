@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-serif mb-2">Assessment Results</h1>
        <p class="text-gray-600">{{ now()->format('F d, Y') }}</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
        <div class="text-center mb-8">
            <div class="inline-block p-6 bg-[#c4d5b8] rounded-full mb-4">
                <span class="text-4xl font-bold text-[#5a6c4f]">{{ $score }}</span>
            </div>
            <p class="text-gray-600">Total Score</p>
        </div>

        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-2xl font-serif mb-4 text-[#5a6c4f]">AI-Powered Insights</h2>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($aiResponse)) !!}
            </div>
        </div>
    </div>

    <div class="bg-[#f0f4ed] rounded-lg p-6 mb-6">
        <h3 class="text-lg font-semibold mb-3 text-[#5a6c4f]">Important Note</h3>
        <p class="text-gray-700">
            This assessment provides general guidance and is not a professional diagnosis. 
            If you're experiencing distress or mental health concerns, please reach out to a 
            qualified mental health professional or contact a crisis helpline.
        </p>
    </div>

    <div class="flex justify-center gap-4">
        <a href="{{ route('quiz.index') }}" 
           class="px-6 py-3 bg-[#c4d5b8] rounded-full hover:bg-[#b0c5a4] transition">
            Take Another Assessment
        </a>
        <a href="{{ route('quiz.history') }}" 
           class="px-6 py-3 bg-[#5a6c4f] text-white rounded-full hover:bg-[#4a5c3f] transition">
            View History
        </a>
        <a href="{{ route('home') }}" 
           class="px-6 py-3 bg-gray-200 rounded-full hover:bg-gray-300 transition">
            Back to Home
        </a>
    </div>

    <div class="mt-8 text-center">
        <h3 class="text-lg font-semibold mb-4 text-[#5a6c4f]">Crisis Resources</h3>
        <div class="grid md:grid-cols-3 gap-4 text-sm">
            <div class="bg-white p-4 rounded-lg">
                <p class="font-semibold mb-1">National Crisis Line</p>
                <p class="text-gray-600">988 (US)</p>
            </div>
            <div class="bg-white p-4 rounded-lg">
                <p class="font-semibold mb-1">Crisis Text Line</p>
                <p class="text-gray-600">Text HOME to 741741</p>
            </div>
            <div class="bg-white p-4 rounded-lg">
                <p class="font-semibold mb-1">International</p>
                <p class="text-gray-600">findahelpline.com</p>
            </div>
        </div>
    </div>
</div>
@endsection