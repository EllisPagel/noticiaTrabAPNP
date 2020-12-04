<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Category;
use Validator;
use App\Post;

Class PostController extends Controller{

    public function index(){
       $posts = Post::all();

       return view('posts', [
            'posts' => $posts
       ]);
    }

    public function create(){
        $post = new Post();
        $categories = Category::all();

       return view('post', [
            'post' => $post,
            'categories' => $categories
       ]);
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required|min:3|max:255',
            'summary' => 'required',
            'text' => 'required',
            'category_id' => 'required|exists:categories,id',
            'post_date' => 'required|date'
        ];

        $messages = [
            'title.required' => 'O campo título deve ser preenchido',
            'title.min' => 'O campo título deve ter pelo menos 3 caracteres',
            'title.max' => 'O campo título deve ter no máximo 255 caracteres',
            'summary.required' => 'O campo resumo deve ser preenchido',
            'text.required' => 'O campo texto deve ser preenchido',
            'category_id.required' => 'Uma categoria deve ser selecionada',
            'category_id.exists' => 'Você deve selecionar uma categoria válida',
            'post_date.required' => 'O campo data deve ser preenchido',
            'post_date.date' => 'Você deve selecionar uma data válida'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $post = new Post();

        $post->title = $request->input('title');
        $post->summary = $request->input('summary');
        $post->text = $request->input('text');
        $post->category_id = $request->input('category_id');
        $post->post_date = $request->input('post_date');
        $post->active = ($request->input('active') == '1');

        $post->save();

        return redirect()->route('posts.index');
        
    }

    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();

       return view('post', [
            'post' => $post,
            'categories' => $categories
       ]);
    }

    public function update(Request $request, $id){
        $rules = [
            'title' => 'required|min:3|max:255',
            'summary' => 'required',
            'text' => 'required',
            'category_id' => 'required|exists:categories,id',
            'post_date' => 'required|date'
        ];

        $messages = [
            'title.required' => 'O campo título deve ser preenchido',
            'title.min' => 'O campo título deve ter pelo menos 3 caracteres',
            'title.max' => 'O campo título deve ter no máximo 255 caracteres',
            'summary.required' => 'O campo resumo deve ser preenchido',
            'text.required' => 'O campo texto deve ser preenchido',
            'category_id.required' => 'Uma categoria deve ser selecionada',
            'category_id.exists' => 'Você deve selecionar uma categoria válida',
            'post_date.required' => 'O campo data deve ser preenchido',
            'post_date.date' => 'Você deve selecionar uma data válida'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->summary = $request->input('summary');
        $post->text = $request->input('text');
        $post->category_id = $request->input('category_id');
        $post->post_date = $request->input('post_date');
        $post->active = ($request->input('active') == '1');
        
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}