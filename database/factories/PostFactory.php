<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'content' => $this->faker->paragraph(5),
            'image' => $this->faker->imageUrl(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
