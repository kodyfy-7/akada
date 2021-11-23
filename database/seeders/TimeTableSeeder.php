<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  1,  
            'period_id' => 1, 
            'subject_id' => 1,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  1,  
            'period_id' => 2, 
            'subject_id' => 2,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  1,  
            'period_id' => 3, 
            'subject_id' => 3,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  1,  
            'period_id' => 4, 
            'subject_id' => 4,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  1,  
            'period_id' => 5, 
            'subject_id' => 5,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  1,  
            'period_id' => 6, 
            'subject_id' => 6,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  1,  
            'period_id' => 7, 
            'subject_id' => 7,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  1,  
            'period_id' => 8, 
            'subject_id' => 8,
        ]);
        
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  2,  
            'period_id' => 1, 
            'subject_id' => 7,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  2,  
            'period_id' => 2, 
            'subject_id' => 4,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  2,  
            'period_id' => 3, 
            'subject_id' => 1,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  2,  
            'period_id' => 4, 
            'subject_id' => 5,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  2,  
            'period_id' => 5, 
            'subject_id' => 3,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  2,  
            'period_id' => 6, 
            'subject_id' => 6,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  2,  
            'period_id' => 7, 
            'subject_id' => 8,
        ]);
        
        \App\Models\TimeTable::create([
            'classroom_id' => 1,
            'weekday_id'  =>  2,  
            'period_id' => 8, 
            'subject_id' => 2,
        ]);
        
    }
}
