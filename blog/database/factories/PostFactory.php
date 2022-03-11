<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //lo que quiuero guardar es una sentencia en vez de una palabra
        $nombre = $this->faker->unique()->sentence();
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            //llenaremos el extracto con un texto de 250 caracteres
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            //llenaremos el estado con campos aleatorios entre 1 y 2
            'status' => $this->faker->randomElement([1, 2]),
            /*para categoria_id que lo rellene con id al azar de la
            clase Categoria. Por eso decimos que llame todos (all) los registros
            de Categoria, y que escoja al azar (random) un id
            */
            'categoria_id'=> Categoria::all()->random()->id,
            //se hace algo similar a lo anterior
            'user_id' => User::all()->random()->id
        ];
    }
}
