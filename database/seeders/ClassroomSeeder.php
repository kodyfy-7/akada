<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Models\Classroom::create([
            'classroom_title' => 'JSS1',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'JSS2',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'JSS3',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'SS1',
            'sub_title' => 'Science',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'SS1',
            'sub_title' => 'Commercial',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'SS1',
            'sub_title' => 'Art',
            'classroom_slug' => now(),
        ]);

        \App\Models\Classroom::create([
            'classroom_title' => 'SS2',
            'sub_title' => 'Science',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'SS2',
            'sub_title' => 'Commercial',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'SS2',
            'sub_title' => 'Art',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'SS3',
            'sub_title' => 'Science',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'SS3',
            'sub_title' => 'Commercial',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'SS3',
            'sub_title' => 'Art',
            'classroom_slug' => now(),
        ]);
        
        \App\Models\Classroom::create([
            'classroom_title' => 'Almuni',
            'sub_title' => '',
            'classroom_slug' => now(),
        ]);
        
        
        
        
    }
}
