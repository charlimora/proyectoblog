<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /*con where hago una búsqueda con filtro, en este caso los que tengan status 2.
     debe usar get para obtener la colección */
    public function index(){
        $posts = Post::where('status',2)->get();
        return view('posts.index',compact('posts'));
    }
}
