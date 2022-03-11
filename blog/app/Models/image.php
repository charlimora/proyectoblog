<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    //relación polimórfica
    //el método se debe llamar como el nombre del campo
    public function imageable(){
        return $this->morphTo();
    }
}
