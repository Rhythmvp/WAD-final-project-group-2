<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\QuizQuestion;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create quiz questions
        $questions = [
            'I feel overwhelmed by my daily responsibilities',
            'I have difficulty sleeping or staying asleep',
            'I feel anxious or worried throughout the day',
            'I find it hard to concentrate on tasks',
            'I feel disconnected from friends and family',
            'I experience sudden mood changes',
            'I have persistent feelings of sadness',
            'I find it difficult to enjoy activities I used to love',
            'I feel physically tired even after resting',
            'I have negative thoughts about myself',
        ];

        foreach ($questions as $index => $question) {
            QuizQuestion::create([
                'question' => $question,
                'order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}