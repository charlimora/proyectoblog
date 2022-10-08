<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /*con where hago una búsqueda con filtro, en este caso los que tengan status 2.
    Es estado 1 es borrador y el 2 es publicado
     debe usar get para obtener la colección */
    public function index(){
        $posts = Post::where('status',2)->latest('id')->paginate(8);
        return view('posts.index',compact('posts'));
    }
}
