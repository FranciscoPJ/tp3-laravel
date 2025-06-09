<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'content' => $request->content,
            'id_post' => $postId,
            'id_user' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Comentario agregado correctamente');
    }
}
