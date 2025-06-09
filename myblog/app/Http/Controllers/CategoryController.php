<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Trae todos los registros de la tabla
        return view('category.index', compact('categories'));
    }

    public function show($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $query = $request->input('search');

        $posts = $category->posts()
            ->when($query, function ($queryBuilder, $search) {
                return $queryBuilder->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10); // Paginación de 10 posts por página

        return view('category.show', compact('category', 'posts', 'query'));
    }
}
