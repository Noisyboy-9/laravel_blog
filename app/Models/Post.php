<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    use HasFactory;

    public string $title;
    public string $description;
    public string $body;
    public string $slug;
    public string $date;


    /**
     * Post constructor.
     *
     * @param string $title
     * @param string $description
     * @param string $slug
     * @param string $date
     * @param string $body
     */
    public function __construct(string $title, string $description, string $slug, string $date, string $body)
    {
        $this->title = $title;
        $this->description = $description;
        $this->body = $body;
        $this->slug = $slug;
        $this->date = $date;
    }

    /**
     * find the post from file contents and cache it.
     *
     * @throws \Exception
     */
    public static function findOrFail(string $slug): Post
    {
        if (!static::all()->contains('slug', $slug)) {
            throw new ModelNotFoundException();
        }

        return cache()->remember(
            "post.$slug",
            5,
            fn() => static::all()->firstWhere('slug', $slug)
        );
    }


    /**
     * get all posts in the /resources/posts directory
     *
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public static function all(): Collection
    {
        return cache()->rememberForever('posts.all',
            fn() => collect(File::files(resource_path("/posts")))
                ->map(fn($document) => YamlFrontMatter::parseFile($document))
                ->map(fn($file) => new Post(
                    $file->title,
                    $file->description,
                    $file->slug,
                    $file->date,
                    $file->body()
                ))
        );
    }
}
