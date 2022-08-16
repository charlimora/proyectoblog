<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /*el primer parámetro es la ruta, el segundo es el ancho en pixeles,
            el tercero es la altura, el cuarto parámetro era la categoria pero ya no
            se usa por eso se pone null. El ultimo parámetro: si ponemos true, el nombre
            de la url será toda la ruta, pero si le pongo false será solo el nombre de la
            imagen. No obstante, solo quiero que en la ruta, aparezca la palabra posts antes,
            por eso concatenamos con la palabra 'posts/' así:
            */
            //'url' => 'posts/' . $this->faker->image(storage_path('app\public\posts'),640, 480, null, false)
            //'url' => 'posts/' . $this->faker->image('public/storage/posts',640, 480, null, false)
            'url' => $this->faker->imageUrl(640, 480)
        ];
    }
}
