<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name' => $this->faker->name(),
            'number_phone' => $this->faker->numberBetween(),
            'from' => 'Hà nội',
            'to' => 'Hồ Chí Minh',
            'departure_date' => $this->faker->date(),
            'return_date' => $this->faker->date(),
            'amount_adults' => $this->faker->numberBetween(),
            'amount_children_less_12' => $this->faker->numberBetween(),
            'amount_children_less_2' => $this->faker->numberBetween(),
            'package' => $this->faker->numberBetween(),
            'status' => 0,
        ];
    }
}
