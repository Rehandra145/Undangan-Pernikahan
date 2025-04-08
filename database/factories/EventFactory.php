<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'groom_name' => $this->faker->name('male'),
            'bride_name' => $this->faker->name('female'),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'place' => $this->faker->address(),
            'maps' => $this->faker->url(),
            'embed_maps' => '<iframe src="' . $this->faker->url() . '" width="600" height="450"></iframe>',
        ];
    }
}
