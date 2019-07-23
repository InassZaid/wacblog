<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\PostTag;
use Illuminate\Support\Facades\Gate;
use App\Notifications\NewPost;

class postsController extends Controller
{
    //
    public function index(){
        return view('admin.posts.index',[
            'posts' => Post::all(),
        ]);

    }

    public function views(){
        $title = request()->input('title');
        return view('admin.posts.view',[
            'posts' => Post::where('title','LIKE', '%' . $title . '%')
                    ->paginate(3),
                    

                  
        ]);
        
    }


    public function trashed(){
        return view('admin.posts.trashed',[
            'posts' => Post::onlyTrashed()->get(),
        ]);
        
    }

    public function restore(Request $request , $id){
        $post= Post::onlyTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect(route('admin.posts.trashed'))->with('message',sprintf('Post "%s" restored', $post->title));
    }

    public function forceDelete($id){
        $post= Post::onlyTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect(route('admin.posts.trashed'))->with('message',sprintf('Post "%s" deleted', $post->title));
    }


    public function create(){
        return view('admin.posts.create');
        
    }

    public function store(Request $request){
        $image = $request->file('image');
        $path = $image->store('images','public');
        $request->validate([
            'title' => 'required | max:255 | min:10',
            'content' => 'required',
            'image' => 'required | image',
        ]);
        
        $post = new Post();
        $post->title= $request->input('title');
        $post->content= $request->input('content');
        $post->image= $path;
        $post->category_id = $request->input('category_id');
        $post->post_status= $request->input('status');
        $post->save();

        $tags= $request->post('tag');
        foreach($tags as $tag_id){
            $postTag = PostTag::create([
                'post_id' => $post->id,
                'tag_id' => $tag_id,
            ]);
        }

        $user = User::find(4);
        $user->notify(new NewPost($post));
        return redirect(route('admin.posts.views'))->with('message',sprintf('Post "%s" stored', $post->title));
        
    }

    public function edit($id){
        if(!Gate::allows('1')){
            abort(403);
        }
        $post = Post::findOrFail($id);
        //$tags = PostTag::where('post_id', $post->id)->pluck('tag_id')->toArray();
        $tags =$post->tags->pluck('id')->toArray();
        return view('admin.posts.edit',[
            'post'=> $post,
            'id' =>$id,
            'tags' => $tags,
        ]);

    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->title= $request->input('title');
        $post->content= $request->input('content');
        $image = $request->file('image');
        if ($image && $image->isValid()) {
            $path = $image->storeAs('images', basename($post->image), 'public');
            $post->image = $path;
        }
        $post->save();
        $tags= $request->post('tag');
        $post->tags()->sync($tags);
        /*
        foreach($tags as $tag_id){
            $postTag = PostTag::create([
                'post_id' => $post->id,
                'tag_id' => $tag_id,
            ]);
        }*/
        return redirect(route('admin.posts.views'))->with('message',sprintf('Post "%s" updated', $post->title));

    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect(route('admin.posts.views'))->with('message',sprintf('Post "%s" deleted', $post->title));
    }
}
