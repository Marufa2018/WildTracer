<?php

namespace Database\Factories;

use App\Models\Instance;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'file_size' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'gps_latitude'=> $this->faker->latitude($min = -90, $max = 90),
            'gps_longitude' => $this->faker->longitude($min = -180, $max = 180),
            'animal_type' => 'Other',
            'location' => $this->faker->cityPrefix(), 
            'month' => $this->faker->monthName($max = 'now'),
            'year' => $this->faker->year($max = 'now'),
            'submitted_by' => $this->faker->name(),
            'mobile' => $this->faker->PhoneNumber(),
        ];
    }
}
