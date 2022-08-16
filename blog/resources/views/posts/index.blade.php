<x-app-layout>
    {{--también añadimos las clases margin left(ml) y margin right (mr) auto --}}
    <div class="container py-8 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

        <div class="grid grid-cols-3 gap-6">
            {{--iteramos el array-obtejo $posts del controlador como $post --}}
            @foreach ($posts as $post)
            {{--con w-full indico el máximo ancho posible
                con h-80 indico 80 rem
                con bg-cover logro que la imagen no se deforme
                con bg-center logro que la imagen esté centrada--}}
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first)
                    col-span-2
                @endif" style="background-image: url({{$post->image->url}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tag as $etiqueta)
                                <a href="" class="inline-block px-3 h-6 bg-gray-600 text-white rounded-full">{{$etiqueta->nombre}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="">
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
    </div>
</x-app-layout>
