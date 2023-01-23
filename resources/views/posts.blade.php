<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <body>

    <main class="flex flex-row justify-center flex-wrap">

        @foreach($posts as $post)

            @if($post->publico == true)

                <div class="flex flex-col border-black rounded border m-auto my-2 w-96 h-96 justify-center bg-white">

                    <div class="font-xl m-2 flex flex-row justify-between">
                        <p>{{$post -> titulo}}</p>
                        @if($post->user_id == Auth::user()->id)
                            <a href="{{route('post.edit', $post->id)}}" class="rounded-sm border-2 border-gray-600 p-1 bg-blue-300">Editar Post</a>
                            <a href="{{route('post.almostDelete', $post->id)}}" class="rounded-sm border-2 border-gray-600 p-1 bg-red-500">Eliminar Post</a>
                        @endif
                    </div>

                    <div class="border-black rounded border m-2">
                        <p>{{$post -> extracto}}</p>
                    </div>

                    <div class="border-black rounded border m-2 h-3/5">
                        <p>{{$post -> contenido}}</p>
                    </div>

                    <div class="border-black rounded border m-2">
                        <p> Creado {{$post -> created_at}} por {{Auth::user()->name}}</p>
                    </div>
                    <div class="border-black rounded border m-2">
                        <p> Este post caducará {{ $post->created_at->addMonths(2) }}</p>
                    </div>
                    <div class="border-black rounded border m-2">
                        @if($post->comentable == true)
                            <p>Este post es comentable</p>
                        @else
                            <p>Este post no es comentable</p>
                        @endif
                    </div>

                </div>
            @endif

        @endforeach
    </main>

    </body>

</x-app-layout>
