<?php
declare(strict_types = 1);

namespace Database\Factories\Models;

use App\Models\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apartment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'name' => $faker->name,
            'address' => $faker->address,
            'text' => $faker->text,
            'liked' => $faker->boolean,
        ];
    }
}
