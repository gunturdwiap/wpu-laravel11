<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'author', 'body'];

    public function author() : BelongsTo 
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category() : BelongsTo 
    {
        return $this->belongsTo(Category::class);    
    }
}
