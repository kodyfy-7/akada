<?php

namespace Database\Factories;

use App\Models\Year;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class YearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Year::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'session' => '2021/2022',
            'term' => 1,
            'admission_score' => 45,
            'days_per_session' => 90,
            'year_slug' => md5(uniqid()),
        ];
    }
}
