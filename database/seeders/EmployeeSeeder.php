<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Models\Employee::create([
            'full_name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'role_id' => 1,
            'employee_slug' => now(),
        ]);
        
        \App\Models\Employee::create([
            'full_name' => 'Sarah Claire',
            'email' => 'sarahclaire@gmail.com',
            'role_id' => 2,
            'classroom_id' => 1,
            'subject_id' => 1,
            'employee_slug' => now(),
        ]);
        
         \App\Models\Employee::create([
            'full_name' => 'Sara',
            'email' => 'sarahire@gmail.com',
            'role_id' => 2,
            'subject_id' => 2,
            'employee_slug' => now(),
        ]);       
        
        \App\Models\Employee::create([
            'full_name' => 'Sarah laire',
            'email' => 'sarahclae@gmail.com',
            'role_id' => 2,
            'subject_id' => 3,
            'employee_slug' => now(),
        ]);
        
         \App\Models\Employee::create([
            'full_name' => 'rah Claire',
            'email' => 'rahclaire@gmail.com',
            'role_id' => 2,
            'subject_id' => 4,
            'employee_slug' => now(),
        ]);       
        
          \App\Models\Employee::create([
            'full_name' => 'Sarah Clair',
            'email' => 'sarahclair@gmail.com',
            'role_id' => 2,
            'subject_id' => 5,
            'employee_slug' => now(),
        ]);      
        
    }
}
