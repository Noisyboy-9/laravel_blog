<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static truncate()
 */
class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'owner'];

    protected $fillable = ['title', 'body', 'description', 'slug', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

