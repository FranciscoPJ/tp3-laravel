<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{   
    // getHome
    public function index(){      
        //$posts = Post::all();    
        $posts = Post::orderBy('id', 'desc')  // Primero obtengo los posts más recientes (los últimos)
            ->take(6) // Solo los 6 últimos
            ->get()
            ->sortBy('id');
        
        return view('home', compact('posts'));
    }

}
?>