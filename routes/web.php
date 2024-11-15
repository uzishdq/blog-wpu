<?php

use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['title' => 'Home']);
});

Route::get("/about", function () {
    return view("about", ['title' => 'About']);
});

Route::get("/posts", function () {
    $posts = Post::latest()->get();
    return view("posts", ['title' => 'Blog', 'posts' => $posts]);
});

Route::get("/posts/{post:slug}", function (Post $post) {
    return view('post', ['title' => 'Single post', 'post' => $post]);
});

Route::get("/author/{user}", function (User $user) {
    return view('posts', ['title' => 'Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get("/categories/{category:slug}", function (Categories $category) {
    return view('posts', ['title' => 'Articles in ' . $category->name, 'posts' => $category->posts]);
});

Route::get("/contact", function () {
    return view("contact", ['title' => 'Contact']);
});
