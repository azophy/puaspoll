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
            $choice[] = [ $this->faker->text(10), $this->faker->randomDigitNotNull() ];
        }

        return [
            'title' => $this->faker->word(),
            'slug' => implode('-',$this->faker->words(3)),
            'description' => $this->faker->text(),
            'choice' => $choice,
        ];
    }
}
