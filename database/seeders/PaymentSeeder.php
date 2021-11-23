<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Payment::create([
            'student_id' => 1,
            'classroom_id' => 1,
            'year_id' => 1,
            'payment_status' => 1,
            'payment_slug' => md5(uniqid())
        ]);
        
        \App\Models\Payment::create([
            'student_id' => 2,
            'classroom_id' => 1,
            'year_id' => 1,
            'payment_status' => 1,
            'payment_slug' => md5(uniqid())
        ]);

        \App\Models\Payment::create([
            'student_id' => 3,
            'classroom_id' => 1,
            'year_id' => 1,
            'payment_status' => 1,
            'payment_slug' => md5(uniqid())
        ]);

        \App\Models\Payment::create([
            'student_id' => 1,
            'classroom_id' => 1,
            'year_id' => 2,
            'payment_status' => 0,
            'payment_slug' => md5(uniqid())
        ]);
        
        \App\Models\Payment::create([
            'student_id' => 2,
            'classroom_id' => 1,
            'year_id' => 2,
            'payment_status' => 0,
            'payment_slug' => md5(uniqid())
        ]);

        \App\Models\Payment::create([
            'student_id' => 3,
            'classroom_id' => 1,
            'year_id' => 2,
            'payment_status' => 0,
            'payment_slug' => md5(uniqid())
        ]);
        
    }
}
