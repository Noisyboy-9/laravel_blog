<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static truncate()
 */
class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'owner', 'comments'];

    protected $fillable = ['title', 'body', 'description', 'slug', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn(Builder $query, string $search) => $query
            ->where(fn($query) => $query
                ->where('title', 'like', "%" . $search . "%")
                ->orWhere('description', 'like', "%" . $search . "%")
                ->orWhere('body', 'like', "%" . $search . '%')
            ));

        $query->when($filters['category'] ?? false, fn(Builder $query, string $category) => $query
            ->whereHas('category', fn(Builder $query) => $query
                ->where('slug', $category)
            )
        );

        $query->when($filters['owner'] ?? false, fn(Builder $query, string $username) => $query
            ->whereHas('owner', fn(Builder $query) => $query
                ->where('username', $username)
                ->orWhere('name', $username)
            )
        );
    }
}

