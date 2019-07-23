<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use App\PostTag;
use App\Tag;

class TagController extends Controller
{
    public function index(){

        return view('admin.tags.index')->with([
        'Tags'=> Tag::paginate(2),


      ]);

    }



    public function create(){

        return view('admin.tags.create');

}



public function store(Request $request){

 $request->validate([

'name'=> 'required|max:255'
   ]);
   $tag= new Tag();
   $tag->name=$request->input('name');
   $tag->save();




 return redirect(route('tags'))->
 with('message',sprintf('Tag: "%s" add success !',$tag->name));

}
public function destroy($id){

    $tags=Tag::findOrfail($id);

    $tags->delete();
    return redirect(route('tags'))
    ->with('message',sprintf('Tag "%s" deleted!',$tags->name));

}
}
