<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Models\Subject::create([
            'subject_title' => 'Biology',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Chemistry',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Physics',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Accounting',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Commerce',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Civic',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Religious Studies',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Food & Nutrition',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Home Management',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Basic Tech',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Basic Science',
            'subject_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Subject::create([
            'subject_title' => 'Agric Science',
            'subject_slug' => md5(uniqid()),
        ]);
        
    }
}
