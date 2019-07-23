<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //

    public function index(){
        
        return view('posts.view',[
            'comments' => Comment::limit(10)->latest()->Paginate(5),
            ]);
    }
}
