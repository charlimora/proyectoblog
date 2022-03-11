<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
Use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $nombre = $this -> faker ->unique() -> word(20);

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre)
        ];
    }
}
