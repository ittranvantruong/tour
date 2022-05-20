<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        return view('public.post.index');
    }

    public function show(){
        return view('public.post.show');
    }
}
