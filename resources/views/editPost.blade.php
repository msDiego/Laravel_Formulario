<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <body class="antialiased m-3 flex justify-center">
    <?php
    $error = "Este campo es obligatorio"
    ?>
    <form action="{{ route('post.update', $posts->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="m-3" style="margin-right: 50%">
            <label for="titulo" class="form-label">Titulo de la publicación</label>
            <input type="text" class="form-control" id="titulo" name="titulo"
                   value="{{$posts->titulo}}">
            @error('titulo')
            <div style="color: orangered"> {{ $error }}</div>
            @enderror
        </div>
        <div class="m-3" style="margin-right: 50%">
            <label for="extracto" class="form-label">Extracto de la publicación</label>
            <input type="text" class="form-control" id="extracto" name="extracto"
                   value="{{$posts->extracto}}">
            @error('extracto')
            <div style="color: orangered"> {{ $error }}</div>
            @enderror
        </div>
        <div class="m-3" style="margin-right: 50%">
            <label for="contenido" class="form-label">Contenido de la publicación</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="7"
                      placeholder="{{$posts->contenido}}"></textarea>
            @error('contenido')
            <div style="color: orangered"> {{ $error }}</div>
            @enderror
        </div>
        <div class="m-3">
            <label for="publico">Post público</label>
            <input type="checkbox" name="publico" id="publico" checked>
            <input class="bg-blue-400 rounded-xl p-2" type="submit" value="Enviar">
        </div>
    </form>
    </body>


</x-app-layout>
