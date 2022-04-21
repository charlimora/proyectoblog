<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //relación uno a muchos inversa
    //Primero lo relacionamos con User
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Luego con Categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Relación muchos a muchos usando belongsToMany

    public function tag(){
        return $this->belongsToMany(tag::class);
    }

    //Relación uno a uno polimórfica

    public function image(){
        //el segundo parámetro es el método que puse en la clase images
        return $this->morphOne(images::class,'imageable');
    }

}
