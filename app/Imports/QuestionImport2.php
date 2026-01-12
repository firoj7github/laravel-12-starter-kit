<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class QuestionImport2 implements ToCollection
{
    /**
     * Import data from the provided collection.
     *
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key < 1) continue; // Skip the header row

            // Create a new question record
            $newQuestion = new Question();
            $newQuestion->category_id = $row[0];
            $newQuestion->sub_category_id = $row[1];
            $newQuestion->question = $row[2];
            $newQuestion->description = $row[4];
            $newQuestion->packages = $row[5];
            $newQuestion->course = $row[6];
            $newQuestion->part = $row[7];

            // Handle image upload (if applicable)
            if (!empty($row[3])) {
                $newQuestion->image = $row[3]; // Assuming direct path or URL
            }

            $newQuestion->save();

            // Extract the correct answer (assuming it's in column 9)
            $correctAnswer = isset($row[9]) ? trim($row[9]) : null;

            // Extract and save answers
            $answers = explode(',', $row[8]);

            foreach ($answers as $answer) {
                $answer = trim($answer); // Remove spaces

                Answer::create([
                    'question_id' => $newQuestion->id,
                    'answer' => $answer,
                    'is_correct' => ($answer === $correctAnswer) ? 1 : 0, // Correct answer check
                ]);
            }
        }
    }
}