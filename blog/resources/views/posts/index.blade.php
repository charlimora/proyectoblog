<x-app-layout>
    {{--también añadimos las clases margin left(ml) y margin right (mr) auto --}}
    <div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-">

        <div class="grid grid-cols-3 gap-6">
            {{--iteramos el array-obtejo $posts del controlador como $post --}}
            @foreach ($posts as $post)
            {{--con w-full indico el máximo ancho posible
                con h-80 indico 80 rem
                con bg-cover logro que la imagen no se deforme
                con bg-center logro que la imagen esté centrada--}}
                <article class="w-full h-80 bg-cover bg-center" style="background-image: url({{Storage::url($post->image->url)}})">
                    {{--aquí mostraremos las imágenes de la tabla image a través de la relación que está en el modelo Post--}}
                   {{--esta fue la propuesta inicial para mostrar la imagen pero...
                    <img src="{{Storage::url($post->image->url)}}" alt="">--}}
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
