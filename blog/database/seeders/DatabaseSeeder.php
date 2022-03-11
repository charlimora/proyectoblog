<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //se deja así, siempre en cuando en el archivo .env tengamos FILESYSTEM_DRIVER=public
        Storage::makeDirectory('posts');

        $this->call(UserSeeder::class);
        //Ahora llamo datos falsos para la categoría
        //quiero generar 4 categorías
        Categoria::factory(4)->create();
        //lo mismo para las etiquetas
        tag::factory(8)->create();
        //y para los posts:
        //No obstante comentaré esta línea de post pues lo haré de otra forma
        //Post::factory(100)->create();
        $this->call(PostSeeder::class);

    }
}
