<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show($id)
    {
        $post = Post::findOrFail($id); // Si no lo encuentra, lanza un 404
        return view('posts.show', compact('post'));
    }


    public function create($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return view('posts.create', compact('category'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'poster' => 'required|image|mimes:jpg,jpeg,png|max:2048', // validación de imagen
        ]);

        // Guardar imagen
        $imagePath = $request->file('poster')->store('posters', 'public');

        // Crear el post
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->description;
        $post->poster = $imagePath;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('category.show', ['id' => $post->category_id])->with('success', 'Post creado con imagen.');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id); // Si no lo encuentra, lanza un 404
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
