<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $faker = \Faker\Factory::create();
        $faker->addProvider(new FakerPicsumImagesProvider($faker));
        //lo siguiente además de guardar la imagen en la ruta especificada genera un string que corresponde a esa ruta
        $ruta = $faker->image('public\storage\posts', $width = 640, $height = 480);
        //como solo deseamos obtener la ruta como: posts\nombreImagen, debemos quitar la parte no deseada
        $url = str_replace('public\storage\posts\\', 'posts/', $ruta);
        //lo siguiente es lo que se retornará realmente en la tabla Image en la BD
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
            //'url' => $this->faker->imageUrl(640, 480)
            'url' => $url
        ];
    }
}
