<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home page']);
});

Route::get('/post', function () {
    return view('posts', ['title' => 'Post', 'posts' => Post::all()]);
});

Route::get('/author/{user}', function (User $user) {
    return view('posts', ['title' => 'Post by '.$user->name, 'posts' => $user->post]);
});

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts', ['title' => $category->name.' Post', 'posts' => $category->post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'name' => 'Jojo']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/test/{user}', function (Request $request, User $user) {

        dd([$request->session()->all(),
        new Illuminate\Http\Response(),
        $user
        ]);
});
