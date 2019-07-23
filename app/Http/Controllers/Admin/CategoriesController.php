<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\PostCategory;

class CategoriesController extends Controller


{
    public function index(){

        return view('admin.category.index')->with([
        'Category'=> Category::paginate(2),


      ]);

    }

 /// view form add category
        public function create(){

              return view('admin.category.create');

     }



  public function store(Request $request){

       $request->validate([

     'name'=> 'required|max:255'
         ]);
         $category= new Category();
         $category->name=$request->input('name');
         $category->save();


       return redirect(route('categories'))->
       with('message',sprintf('Category: "%s" add success !',$category->name));

}


      public function edit($id){
          $category=Category::findOrfail($id);

             return  view('admin.category.edit',[
           'Category'=>  $category ,


            ]);

 }

 public function update(Request $request,$id){
    $category=Category::findOrfail($id);
    $category->name=$request->input('name');
   $category->save();
   return redirect(route('categories'))->
   with('message',sprintf('Category: "%s" update success !',$category->name));

}


public function destroy($id){

    $category=Category::findOrfail($id);

    $category->delete();
    return redirect(route('categories'))
    ->with('message',sprintf('Category "%s" deleted!',$category->name));

}
public function posts($id){
  $category = Category::findOrFail($id);
  return $category->posts;
}

}
