<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResultDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        \App\Models\ResultDetail::create([
            'subject_id' => 1,
            'result_id' => 1,
            'ca_1' => 15,
            'ca_2' => 20,
            'exam_score' => 45,
            'total_score' => 80,
        ]);

        \App\Models\ResultDetail::create([
            'subject_id' => 2,
            'result_id' => 1,
            'ca_1' => 10,
            'ca_2' => 25,
            'exam_score' => 40,
            'total_score' => 75,
        ]);

        \App\Models\ResultDetail::create([
            'subject_id' => 3,
            'result_id' => 1,
            'ca_1' => 25,
            'ca_2' => 25,
            'exam_score' => 55,
            'total_score' => 80,
        ]);

        \App\Models\ResultDetail::create([
            'subject_id' => 1,
            'result_id' => 2,
            'ca_1' => 10,
            'ca_2' => 20,
            'exam_score' => 30,
            'total_score' => 60,
        ]);

        \App\Models\ResultDetail::create([
            'subject_id' => 2,
            'result_id' => 2,
            'ca_1' => 15,
            'ca_2' => 15,
            'exam_score' => 45,
            'total_score' => 75,
        ]);

        \App\Models\ResultDetail::create([
            'subject_id' => 3,
            'result_id' => 2,
            'ca_1' => 20,
            'ca_2' => 20,
            'exam_score' => 50,
            'total_score' => 90,
        ]);

        \App\Models\ResultDetail::create([
            'subject_id' => 1,
            'result_id' => 3,
            'ca_1' => 7,
            'ca_2' => 7,
            'exam_score' => 30,
            'total_score' => 44,
        ]);

        \App\Models\ResultDetail::create([
            'subject_id' => 2,
            'result_id' => 3,
            'ca_1' => 10,
            'ca_2' => 12,
            'exam_score' => 32,
            'total_score' => 52,
        ]);

        \App\Models\ResultDetail::create([
            'subject_id' => 3,
            'result_id' => 3,
            'ca_1' => 14,
            'ca_2' => 12,
            'exam_score' => 25,
            'total_score' => 51,
        ]);
    }
}
