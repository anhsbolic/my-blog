<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    protected $limitPaginate = 5;
    
    public function index(){
        $data = Post::with('author')->latestFirst()->simplePaginate($this->limitPaginate);//or simplePaginate
        return view('blog.index', compact('data'));
    }

    public function show($slug){
        $data = Post::with('author')->where('slug', $slug)->get();
        return view('blog.show', compact('data'));
    }
}
