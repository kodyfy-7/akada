<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApplicantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Applicant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'full_name' => $this->faker->name($gender),
            'registration_number' => $this->faker->numberBetween(1, 1000),
            'email' => $this->faker->safeEmail,
            'date_of_birth' => $this->faker->date($format = 'd/m/Y', $max = 'now'), 
            'gender' => $gender,
            'classroom_id' => 1,
            'year_id' => 1,
            'applicant_score' => $this->faker->numberBetween(40, 100),
            'applicant_status' => 0,
          
        ];
    }
}
