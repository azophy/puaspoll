<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $choice = [];

        foreach (range(1, $this->faker->randomDigitNotNull()) as $num) {
            $choice[] = [
                'title' => $this->faker->text(10),
                'score' => $this->faker->randomDigitNotNull(),
                'num_voter' => $this->faker->randomDigitNotNull(),
            ];
        }

        return [
            'title' => $this->faker->word(),
            'slug' => implode('-',$this->faker->words(3)),
            'description' => $this->faker->text(),
            'choice' => $choice,
        ];
    }
}
