<?php

namespace Database\Factories;

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

    public function numeroAleatorio($primero, $segundo){
        $fileName = $this->faker->numberBetween($primero, $segundo).'.jpg';
        return $fileName;
    }

    public function definition()
    {
        $fileName = $this->numeroAleatorio(1, 10);

        return [
            'path' => "img/products/{$fileName}"
        ];
    }

    public function user()
    {
        $fileName = $this->numeroAleatorio(1, 5);;

        return $this->state([
            'path' => "img/users/{$fileName}"
        ]);
    }
}
