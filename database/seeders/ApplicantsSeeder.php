<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      \App\Models\Applicant::factory(5)->create();
    }
}
