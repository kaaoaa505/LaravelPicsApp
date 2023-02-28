<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $width = 1920;
        $height = 1280;

        $users = User::pluck('id')->toArray();

        shuffle($users);
        $user = $users[0];

        return [
            'title' => $title = fake()->sentence(),
            'slug' => str()->slug($title).'_'.date("Y-m-d_H-i-s_u"),
            'file' => fake()->imageUrl($width, $height),
            'dimension' => $width.'x'.$height,
            'views_count' => fake()->randomNumber(5),
            'downloads_count' => fake()->randomNumber(4),
            'is_published' => fake()->boolean(),
            'user_id' => $user,
        ];
    }
}
