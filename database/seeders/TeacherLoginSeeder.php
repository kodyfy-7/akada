<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeacherLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Models\TeacherLogin::create([
            'username' => 'teacher1',
            'employee_id' => 2,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        
        \App\Models\TeacherLogin::create([
            'username' => 'teacher2',
            'employee_id' => 3,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        
         \App\Models\TeacherLogin::create([
            'username' => 'teacher3',
            'employee_id' => 4,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);       
        
        \App\Models\TeacherLogin::create([
            'username' => 'teacher4',
            'employee_id' => 5,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        
         \App\Models\TeacherLogin::create([
            'username' => 'teacher5',
            'employee_id' => 6,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);       
        
    }
}
