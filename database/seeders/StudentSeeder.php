<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::create([
            'full_name' => 'John Doe',
            'registration_number' => 'AKD/2021/2022/000001',
            'date_of_birth' => '01/01/2015',
            'gender' => 'Male',
            'classroom_id' => 1,
            'student_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Student::create([
            'full_name' => 'Elisah Good',
            'registration_number' => 'AKD/2021/2022/000002',
            'date_of_birth' => '01/02/2015',
            'gender' => 'Male',
            'classroom_id' => 1,
            'student_slug' => md5(uniqid()),
        ]);   

        \App\Models\Student::create([
            'full_name' => 'Winifred Joy',
            'registration_number' => 'AKD/2021/2022/000003',
            'date_of_birth' => '03/01/2015',
            'gender' => 'Female',
            'classroom_id' => 1,
            'student_slug' => md5(uniqid()),
        ]);
        
    }
}
