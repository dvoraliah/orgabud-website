<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Year;
use App\Models\Field;
use App\Models\Month;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'value' => $this->faker->randomFloat(2, 0.01, 3000),
            'field_id' => Field::query()->inRandomOrder()->first()->id,
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'month_id' => $this->faker->random_int(20)
            'month_id' => Month::query()->inRandomOrder()->first()->id,
            'year_id' => Year::query()->inRandomOrder()->first()->id,
            'is_debited' => $this->faker->boolean(),

        ];
    }
}
