<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Llamo al modelo User y...
        User::create([
            'name' => 'Carlos Andres Mora',
            'email' => 'andres@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::factory(99)->create();

    }
}
