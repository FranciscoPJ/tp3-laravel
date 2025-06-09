<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poster', 'habilitated', 'content', 'id_user', 'id_category'];

    public function user()
    {
        // cada post pertenece a un solo usuario, por eso belongsTo()
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_post');
    }
}
