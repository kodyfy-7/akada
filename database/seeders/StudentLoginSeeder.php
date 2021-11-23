<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StudentLogin::create([
            'username' => 'johndoe',
            'email' => 'johndoe@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'student_id' => 1,
        ]);

        \App\Models\StudentLogin::create([
            'username' => 'elisahgood',
            'email' => 'elisahgood@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'student_id' => 2,
        ]); 

        \App\Models\StudentLogin::create([
            'username' => 'winifredjoy',
            'email' => 'winifredjoy@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'student_id' => 3,
        ]); 
    }
}
