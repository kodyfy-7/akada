<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        \App\Models\Year::create([
            'session' => '2021/2022',
            'term' => 1,
            'admission_score' => 45,
            'admission_status' => 1,
            'days_per_session' => 90,
            'year_status' => 1,
            'result_status' => 1,
            'year_slug' => md5(uniqid()),
        ]);
        
        \App\Models\Year::create([
            'session' => '2021/2022',
            'term' => 2,
            'days_per_session' => 90,
            'year_status' => 0,
            'result_status' => 0,
            'year_slug' => md5(uniqid()),
        ]);
        
    }
}
