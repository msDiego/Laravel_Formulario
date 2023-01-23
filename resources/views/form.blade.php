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
    <h1 class="text-3xl m-3">POSTS</h1>
    <h2 class="text-xl m-3">Crear una publicación</h2>
    <form action="{{ route('submitControl') }}" method="POST">
        @csrf
        <div class="m-3" style="margin-right: 50%">
            <label for="exampleFormControlInput1" class="form-label">Titulo de la publicación</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="titulo"
                   placeholder="Ingresa aquí el título" value="{{old('titulo')}}">
            @error('titulo')
            <div style="color: orangered"> {{ $error }}</div>
            @enderror
        </div>
        <div class="m-3" style="margin-right: 50%">
            <label for="exampleFormControlInput2" class="form-label">Extracto de la publicación</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" name="extracto"
                   placeholder="Ingresa aquí el extracto de la publicación" value="{{old('extracto')}}">
            @error('extracto')
            <div style="color: orangered"> {{ $error }}</div>
            @enderror
        </div>
        <div class="m-3" style="margin-right: 50%">
            <label for="exampleFormControlTextarea1" class="form-label">Contenido de la publicación</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="contenido" rows="7"
                      placeholder="Introduce aquí el contenido"></textarea>
            @error('contenido')
            <div style="color: orangered"> {{ $error }}</div>
            @enderror
        </div>
        <div class="m-3">
            <label for="publico">Post público</label>
            <input type="checkbox" name="publico" id="publico" checked>
            <label for="comentable">Post comentable</label>
            <input type="checkbox" name="comentable" id="comentable" checked>
            <input class="bg-blue-400 rounded-xl p-2" type="submit" value="Enviar">
        </div>
    </form>
    </body>

</x-app-layout>
