<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <body class="antialiased m-3 flex justify-center">

    <div class="flex flex-col border-black rounded border m-auto my-3 w-96 h-96 bg-white items-center">
        <p class="m-auto text-center text-3xl"> ¿Estás seguro de querer eliminar el post?</p>

        <form action="{{ route('post.delete', $id) }}" method="POST" class="m-auto flex justify center">
            @csrf
            @method('DELETE')
            <input class="bg-red-500 rounded-xl p-3 w-72 text-2xl" type="submit" value="Borrar">

        </form>
    </div>

    </body>


</x-app-layout>
