<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //relación de uno a muchos
    public function posts(){
        return $this->hasMany(Post::class); //así lo relacionamos con Post

    }
}
