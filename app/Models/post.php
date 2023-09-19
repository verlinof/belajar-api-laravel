<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'news_content', 'author'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    /**
     * The  that belong to the post
    
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    public function Commentator(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, Comment::class);
    }
}