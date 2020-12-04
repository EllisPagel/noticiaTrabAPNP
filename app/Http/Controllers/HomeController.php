<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Post;


class HomeController extends Controller{
    
    public function index(){
        $categories = Category::all();
        $posts = Post::all(); 

        return view('home', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
