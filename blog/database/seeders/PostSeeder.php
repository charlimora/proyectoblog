<?php

namespace Database\Seeders;

use App\Models\image;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //quiero crear una colección con todos los post creados
        $posts = Post::factory(100)->create();

        foreach($posts as $alias){ //abro el foreach
            /*dentro llamaremos al factory ImageFactory
            También es necesario incluir otros campos de la tabla images
            como son imageable_id e imageable_type, los cuales pasaremos en un array */
            image::factory(1)->create([
                'imageable_id'=> $alias->id,
                //luego el tipo en este caso sería post, pero claro en otros casos sería el tipo requerido
                'imageable_type'=>Post::class
            ]);
        /*acudimos a la variable $posts creada más arriba. Con tags() llamo al método q está
        en el modelo Post y attach permite rellenar la tabla intermedia con datos: */
       // $posts->tags()->attach([1,2]);
        $alias->tag()->attach([
            rand(1,4),
            rand(5,8)
        ]);
        } //cierro foreach
    }
}
