<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Carbon;

class PostController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required',
            'extracto' => 'required',
            'contenido' => 'required',

        ]);

        $post = new Post;
        $post->titulo = $request->titulo;
        $post->extracto = $request->extracto;
        $post->contenido = $request->contenido;
        $post->publico = isset($request->publico) ? 1 : 0;
        $post->comentable = isset($request->comentable) ? 1 : 0;
        $post->user_id = $request->user()->id;

        $post->save();

        return redirect()->route('post.retrieve');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $now = Carbon::now();

        $posts = Post::all();

        foreach ($posts as $post){

            if($post->created_at->addMonths(2) < $now) {

                $post->delete();
            }
        }

        return view('posts', ['posts' => $posts]);

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {

        $post = Post::find($id);

        return view('editPost', ['posts' => $post]);

    }

    /**
     * @param int id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePost(Request $request, $id) {

        Post::where('id', $id)->update([
            'titulo' => $request->titulo,
            'extracto' => $request->extracto,
            'contenido' => $request->contenido,
            'publico' => isset($request->publico) ? 1 : 0]);


        return redirect()->route('post.retrieve');
    }

    public function delete($id) {

        return view('deletePost', ['id' => $id]);

    }

    public function deletePost ($id){

        Post::destroy($id);

        return redirect()->route('post.retrieve');
    }

}
