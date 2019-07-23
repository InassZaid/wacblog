<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostStat;
use DB;
use App\Comment;
use Auth;
use App\User;

class PostController extends Controller
{
    //
    public function index(){

        return view('posts.index',[
            'posts' => Post::where('post_status','published')->latest()->Paginate(9),
            'postsview' => Post::limit(3)->latest()->get(),
            //'comments' => Comment::limit(10)->latest()->Paginate(5),
        ]);
    }

    public function view($id){
        $post=Post::where('post_status','published')->find($id);
        $comments = Comment::where('post_id' , $id)->latest()->Paginate(10);
        
        if(!$post){
                abort(404);
        }

        $stat= PostStat::updateOrCreate([
            'post_id' => $post->id,
        ], [
            'views' => DB::raw('views +1'),
            
        ]);
        return view('posts.view',[
            'posts' => $post,
            'comments' =>$comments,
        ]);
    }

    public function createComment(Request $request){
                
        $request->validate([
            'comment' =>'required | max:255',
            'name' =>'required | max:50',
        ]);
        Comment::create([
            'comment' =>$request->input('comment'),
            'name' =>$request->input('name'),
            'post_id' =>$request->input('post_id'),
        ]);

        return redirect()->action('PostController@index')->with('success', 'Comment Created !');
    }

    public function addLike($id){
        $post=Post::where('post_status','published')->find($id);
        $comments = Comment::where('post_id' , $id)->latest()->Paginate(10);  
        $stat = PostStat::findOrFail($id);
        $stat->increment('likes',1);
         
        return view('posts.view',[
            'posts' => $post,
            'comments' =>$comments,
        ]);
    }
}
