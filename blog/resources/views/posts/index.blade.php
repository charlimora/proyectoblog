<x-app-layout>
    {{--también añadimos las clases margin left(ml) y margin right (mr) auto --}}
    <div class="container py-8 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{--iteramos el array-obtejo $posts del controlador como $post --}}
            @foreach ($posts as $post)
            {{--con w-full indico el máximo ancho posible
                con h-80 indico 80 rem
                con bg-cover logro que la imagen no se deforme
                con bg-center logro que la imagen esté centrada--}}
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first)
                    md:col-span-2
                {{--en la siguiente línea $post es el que recorre el array.
                    Tener en cuenta que image es el nombre de la relación (se mira en el modelo Post cómo aparece.
                    Además, url es un campo de la tabla images--}}
                {{-- @endif" style="background-image:url({{Storage::url($post->image->url)}})"> De esta manera es si la imagen estaba descargada--}}
                    @endif" style="background-image:url({{$post->image->url}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tag as $etiqueta)
                                <a href="" class="inline-block px-3 h-6 bg-{{$etiqueta->color}}-600 text-white rounded-full">{{$etiqueta->nombre}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('posts.show', $post)}}">
                            {{--otra forma sería <a href="posts/{{$post->id}}"> --}}
                                {{$post->nombre}}
                            </a>
                        </h1>
                    </div>

                    {{--aquí mostraremos las imágenes de la tabla image a través de la relación que está en el modelo Post--}}
                   {{--esta fue la propuesta inicial para mostrar la imagen pero...
                    <img src="{{Storage::url($post->image->url)}}" alt="">--}}
                </article>
            @endforeach
        </div>

        <div class="mt-4"> {{--margin top de 4--}}
            {{$posts->links()}}
        </div>

    </div>
</x-app-layout>
