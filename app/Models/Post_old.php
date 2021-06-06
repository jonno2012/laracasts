<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

// from chapter one
class Post_old extends Model
{
    use HasFactory;

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    /**
     * Post constructor.
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     * @param $slug
     */
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function find(string $slug) {
        // of all the blog posts find the one with a slug which was matched.
        return static::getAll()->firstWhere('slug', $slug);
    }

    public static function findOrFail(string $slug) {
        $post = static::find($slug);
        if(!$post) throw new ModelNotFoundException();
        return $post;
    }

    public static function getAll() {
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path('posts')))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                )
                )->sortByDesc('date');
        });

    }
}
