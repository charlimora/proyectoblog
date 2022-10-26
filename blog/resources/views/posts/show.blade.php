<x-app-layout>

    <div class="container py-8 mx-auto">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->nombre}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$post->extract}}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- contenido principal --}}
            <div class=" lg:col-span-2 ">
                <figure>
                    {{-- en condiciones normales se usaría un Storage::url() pero como no es posible descargar
                    imágenes de prueba a nuestro directorio, usamos la url online de la imagen --}}
                    <img class="w-full h-80 object-cover object-center" src="{{$post->image->url}}" alt="">
                </figure>
                <div class=" text-base text-gray-500 mt-4">
                    {{$post->body}}
                </div>
            </div>

            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$post->categoria->nombre}}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                <img class="h-20 object-cover object-center" src="{{ $similar->image->url }}" alt="">
                                <span class="ml-2 text-gray-600">{{ $similar->nombre }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>

</x-app-layout>
