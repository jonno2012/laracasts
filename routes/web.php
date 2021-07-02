<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use \App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DibbleController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/category/{category:slug}', function(Category $category) {
//    $post = Category::find()->posts;
//    var_dump($post);
    return view('post.posts', [
        'posts' => $category->posts->load(['category', 'author']),
//        'categories' => Category::all() // no longer needed because of dedicated component view
    ]);
});

Route::get('/user/{user:id}', function(User $user) {
    return view('user', [
        'user' => $user,
        'posts' => $user->posts
    ]);
});

Route::get('/author/{author:username}', function(User $author) {
//    dd($author);
    return view('post.posts', [
        'posts' => $author->posts->load(['category', 'author'])
    ]);
});

Route::get('/dibble', [DibbleController::class, 'index']);


Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register', [RegisterController::class, 'create']);
