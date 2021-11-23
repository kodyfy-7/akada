<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WeekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Models\WeekDay::create([
            'day' => 'Monday'
        ]);
        
        \App\Models\WeekDay::create([
            'day' => 'Tuesday'
        ]);
        
        \App\Models\WeekDay::create([
            'day' => 'Wednesday'
        ]);
        
        
        \App\Models\WeekDay::create([
            'day' => 'Thursday'
        ]);
        
        \App\Models\WeekDay::create([
            'day' => 'Friday'
        ]);
    }
}
