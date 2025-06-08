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
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }



    public function store(Request $request)
    {
        // 'poster' => 'required|image|mimes:jpg,jpeg,png|max:2048', // validación de imagen  
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'required|string',
            'content' => 'required|string',            
            'id_category' => 'required|exists:categories,id',
        ]);

        // Guardar imagen
        //$imagePath = $request->file('poster')->store('posters', 'public');

        // Crear el post
        $post = new Post();
        $post->title = $request->title;
        $post->poster = $request->poster;
        $post->habilitated = $request->has('habilitated') ? true : false;
        $post->content = $request->content;        
        //$post->poster = $imagePath;

        // Claves foráneas
        $post->id_category = $request->id_category; // Id de categoria  
        $post->id_user = auth()->id(); // Usuario autenticado
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id])->with('success', 'Post creado con imagen.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id); // Si no lo encuentra, lanza un 404
        
        //  Si el usuario no es el dueño, abortar con error 403 (Prohibido)
        if (auth()->id() !== $post->id_user) {
            abort(403, 'No tenés permiso para editar este post.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->description;

        if ($request->hasFile('poster')) {
            $imagePath = $request->file('poster')->store('posters', 'public');
            $post->poster = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Post actualizado correctamente.');
    }
}
