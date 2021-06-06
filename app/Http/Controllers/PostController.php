<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))
                                ->with('category', 'author')
                                ->paginate(2)->withQueryString();
//                                ->simplePaginate(2);
//        dd($posts->get());
//        $posts = Post::latest('published_at')->with('category', 'author');
//    dd($posts);
//    $oldestPost = Post::oldest()->with('category', 'author')->first()->category;
//    dd($oldestPost);

//dd($posts->title);
//    \Illuminate\Support\Facades\DB::listen(function($query) {
//        logger($query->sql, $query->bindings);
//    });



        return view('post.posts', [
            'posts' => $posts,
//        'posts' => Post::all()
//            'posts' => $posts->with('category', 'author')->get(),
//        'posts' => Post::latest('published_at')->with('category', 'author')->get(),
//            'categories' => Category::all(), //don't need because dedicated component

        ]);
    }

    public function show(Post $post)
    {
        //    $body = htmlspecialchars('<strong>alert("hello")</strong>', ENT_QUOTES, 'UTF-8');
//    POST::create(['body'=>$body, 'title'=>'test', 'excerpt'=>'test']);

        // route/model binding. it automatically maps to the matching ppost model entry
        return view('post.index', [
            'post' => $post // auto mapped without having to do a find::() etc. uses id by default.
        ]);
//})->where('post', '[A-z_\-]+');
    }
}
