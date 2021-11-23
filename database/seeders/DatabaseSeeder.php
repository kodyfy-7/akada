<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
      $this->call(YearSeeder::class);
      $this->call(RoleSeeder::class);
      $this->call(ClassroomSeeder::class);
      $this->call(SubjectSeeder::class);
      $this->call(ClassroomSubjectSeeder::class);
      $this->call(EmployeeSeeder::class);
      \App\Models\AdminLogin::factory(1)->create();
      $this->call(TeacherLoginSeeder::class);
      $this->call(WeekDaySeeder::class);
      $this->call(PeriodSeeder::class);
      $this->call(TimeTableSeeder::class);
      //$this->call(ApplicantsSeeder::class);
      $this->call(StudentSeeder::class);
      $this->call(StudentLoginSeeder::class);
      $this->call(ResultSeeder::class);
      $this->call(WalletSeeder::class);
      $this->call(PaymentSeeder::class);
      $this->call(ResultDetailSeeder::class);
   
    }
}
