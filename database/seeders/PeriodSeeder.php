<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Models\Period::create([
            'period' => '1',
            'interval' => '8:10-8:50',
        ]);
        
        \App\Models\Period::create([
            'period' => '2',
            'interval' => '8:50-9:20',
        ]);
        
        \App\Models\Period::create([
            'period' => '3',
            'interval' => '9:20-10:00',
        ]);
        
        \App\Models\Period::create([
            'period' => '4',
            'interval' => '10:05-10:35',
        ]);
        
        \App\Models\Period::create([
            'period' => '5',
            'interval' => '10:35-11:15',
        ]);
        
        \App\Models\Period::create([
            'period' => '6',
            'interval' => '12:00-12:40',
        ]);
        
        \App\Models\Period::create([
            'period' => '7',
            'interval' => '12:40-1:20',
        ]);
        
        \App\Models\Period::create([
            'period' => '8',
            'interval' => '1:20-2:00',
        ]);
        
    }
}
