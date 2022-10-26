<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categoria;

class PostController extends Controller
{
    /*con where hago una búsqueda con filtro, en este caso los que tengan status 2.
    Es estado 1 es borrador y el 2 es publicado
     debe usar get para obtener la colección */
    public function index(){
        $posts = Post::where('status',2)->latest('id')->paginate(8);
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){

        $similares = Post::where('categoria_id', $post->categoria_id)
                            ->where('status', 2)
                            ->where('id', '!=', $post->id)
                            ->latest('id') //lo ordena de manera descendente por id
                            ->take(4) //solo trae 4 registros
                            ->get();

        return view('posts.show', compact('post', 'similares'));
    }

    public function category(Categoria $category){
        return $category;
    }
}
