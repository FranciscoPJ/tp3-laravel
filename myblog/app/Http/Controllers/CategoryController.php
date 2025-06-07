<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Trae todos los registros de la tabla
        return view('category.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::with('posts')->findOrFail($id);
        return view('category.show', compact('category'));
    }


    public function create()
    {

        return view('category.create');
    }
    
}
