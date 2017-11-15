<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Database\Query\Builder;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function index()
    {
        // Auth::check();
        User::create(['name'=>'test','email' => 'test@test.fr', 'password' => Hash::make('0000')]);
        Auth::attempt(['name' => 'test','email'=>'test@test.fr','password'=>'0000']);
        //$posts = Post::get();//On  recupère tous les articles sans aucun trie
        // $posts = Post::where('online', true)->get();
        // $posts = Post::published()->get();
        // $posts=Post::publiched()->searchByTitle('article')->get();
        $posts = Post::with('category')->get();
        // $posts=Post::with(['category'=>function ($query) {
            // $query->select('name');
        // }])->get();
        //$posts->load('category');
        return view('posts.index', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update($id, \App\Http\Requests\EditPostRequest $request)
    {
        // $validator = \Validator::make($request->all(), [
            //     'title'=>'required|min:5',
            //     'content' => 'required|min:10'
            // ]);
        // $this->validate($request, Post::$rules);
        $post = Post::findOrFail($id);
        // dd($validator->messages());
        // dd($request->all());
        // $post->tags()->sync($request->get('tags'));
        // return view('default');
        // if ($validator->fails()) {
        //     return redirect(route('news.edit', $id))->withErrors($validator->errors());
        // } else {
        $post->update($request->all());
        return redirect(route('news.edit', $id));
        // }
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::pluck('name', 'id');
        return view("posts.create", compact("post", "categories"));
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        // $categories = Category::pluck('name', 'id');
        return redirect(route('news.edit', $post));
    }

    public function show($id)
    {
        $post = Post::published()->where('id', $id)->firstOrFail();
        return $post;
    }
}
