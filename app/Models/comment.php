<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "post_id",
        "user_id",
        "comments_content"
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}