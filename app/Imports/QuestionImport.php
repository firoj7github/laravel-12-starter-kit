<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Create question first
        $question = Question::create([
            'category_id'      => $row['category_id'],
            'sub_category_id'  => $row['sub_category_id'],
            'question'         => $row['question'],
            'description'      => $row['description'],
            'packages'         => $row['packages'],
            'course'           => $row['course'],
            'part'             => $row['part'],
            'image'            => $row['image'] ?? null,
        ]);

        // Extract correct answer (column name correct_answer)
        $correctAnswer = $row['correct_answer'] ?? null;

        // Extract answer list
        $answers = explode(',', $row['answers']);

        foreach ($answers as $answer) {
            $answer = trim($answer);

            Answer::create([
                'question_id' => $question->id,
                'answer'      => $answer,
                'is_correct'  => ($answer === $correctAnswer) ? 1 : 0,
            ]);
        }

        return $question;
    }
}
