<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function show($id)
    {
        $post = Post::findOrFail($id); // Si no lo encuentra, lanza un 404
        $isOwner = Auth::id() === $post->id_user;
        return view('posts.show', compact('post', 'isOwner'));
    }

    public function create()
    {
        //  Si el usuario no es el dueño, abortar con error 403 (Prohibido)
        if (!auth()->id()) {
            abort(403, 'No tenés permiso para editar este post.');
        }

        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'required|string',
            'content' => 'required|string',
            'id_category' => 'required|exists:categories,id',
        ]);

        // Crear el post
        $post = new Post();
        $post->title = $request->title;
        $post->poster = $request->poster;
        $post->habilitated = $request->has('habilitated') ? true : false;
        $post->content = $request->content;

        // Claves foráneas
        $post->id_category = $request->id_category; // Id de categoria  
        $post->id_user = auth()->id(); // Usuario autenticado
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id])->with('success', 'Post creado con imagen.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id); // Si no lo encuentra, lanza un 404
        $categories = Category::all(); // Pasa las categorías

        if (auth()->id() !== $post->id_user) {
            abort(403, 'No tenés permiso para editar este post.');
        }

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'required|string',
            'content' => 'required|string',
            'id_category' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->poster = $request->poster;
        $post->habilitated = $request->has('habilitated');
        $post->content = $request->content;

        $post->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Post actualizado correctamente.');
    }
}
