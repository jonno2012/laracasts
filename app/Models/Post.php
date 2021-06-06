<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;
    // security vulnerabilities associated with mass assignment
    protected $fillable = ['title', 'excerpt', 'body', 'category_id', 'user_id', 'slug'];
//    protected $guarded = ['id']; // permit mass assignment of all fields except id
// protected $guarded = []; // allow mass assignment for no fields

//    protected $with = ['category', 'author'];

    public function category(): object
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function comments(): object
    {
        return $this->hasMany(Comment::class);
    }

    public function author(): object
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where( fn ($query) =>
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereHas('category', fn ($query) => $query->where('slug', $category)
            ->with('category'))
        );

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas('author', fn ($query) => $query->where('username', $author)
            ->with('author'))
        );

        /*
         * select * from posts
         * where exists (
         * select * from categories where categories.id = posts.category_id
         * )
         */
    }
}
