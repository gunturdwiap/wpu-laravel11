<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'author', 'body'];
    protected $with = ['author', 'category'];

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filter)
    {
        if (isset($filter['title'])) {
            $query->where('title', 'LIKE', '%'.$filter['title'].'%');
        }

        if (isset($filter['category'])) {
            $query->whereHas('category', function ($q) use ($filter) {
                return $q->where('slug', 'LIKE', '%'.$filter['category'].'%');
            });
        }

        if (isset($filter['author'])) {
            $query->whereHas('author', function ($q) use ($filter) {
                return $q->where('email', 'LIKE', '%'.$filter['author'].'%');
            });
        }

    }
}
