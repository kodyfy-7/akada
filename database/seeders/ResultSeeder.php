<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {           
        \App\Models\Result::create([
            'student_id' => 1,
            'classroom_id' => 1,
            'year_id' => 1,
            'grand_score' => 235,
            'average_score' => 78.33,
            'session_average' => 0,
            'result_status' => 1,
            'grade' => 'A',
            'comment' => 'A nice result',
            'attendance_per_cent' => '89%',
            'result_slug' => md5(uniqid())
        ]);

        \App\Models\Result::create([
            'student_id' => 2,
            'classroom_id' => 1,
            'year_id' => 1,
            'grand_score' => 225,
            'average_score' => 75.00,
            'session_average' => 0,
            'result_status' => 1,
            'grade' => 'A',
            'comment' => 'A nice result',
            'attendance_per_cent' => '89%',
            'result_slug' => md5(uniqid())
        ]);

        \App\Models\Result::create([
            'student_id' => 3,
            'classroom_id' => 1,
            'year_id' => 1,
            'grand_score' => 147,
            'average_score' => 49.00,
            'session_average' => 0,
            'result_status' => 1,
            'grade' => 'D',
            'comment' => 'Room for improvement',
            'attendance_per_cent' => '69%',
            'result_slug' => md5(uniqid())
        ]);

        \App\Models\Result::create([
            'student_id' => 1,
            'classroom_id' => 1,
            'year_id' => 2,
            'grand_score' => 0,
            'average_score' => 0,
            'session_average' => 0,
            'result_status' => 0,
            'result_slug' => md5(uniqid())
        ]);

        \App\Models\Result::create([
            'student_id' => 2,
            'classroom_id' => 1,
            'year_id' => 2,
            'grand_score' => 0,
            'average_score' => 0,
            'session_average' => 0,
            'result_status' => 0,
            'result_slug' => md5(uniqid())
        ]);

        \App\Models\Result::create([
            'student_id' => 3,
            'classroom_id' => 1,
            'year_id' => 2,
            'grand_score' => 0,
            'average_score' => 0,
            'session_average' => 0,
            'result_status' => 0,
            'result_slug' => md5(uniqid())
        ]);
    }
}
