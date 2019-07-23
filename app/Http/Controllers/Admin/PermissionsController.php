<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionsController extends Controller
{
    //
    public function index(){
        return view('admin.UserPermission.permission',[
            'permissions' =>Permission::Paginate(3),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required | max:255',
        ]);
        Permission::create([
            'name' =>$request->input('name'),
        ]);

        return redirect()->action('Admin\PermissionsController@index')->with('success', 'Permission Created !');
    }

    public function edit($id){
        $permission = Permission::findOrFail($id);
        //$roles =$role->pluck('id')->toArray();
        return view('admin.UserPermission.editpermission',[
            'permission'=> $permission,
        ]);

    }

    public function update(Request $request, $id){
        $permission = Permission::findOrFail($id);
        $permission->name= $request->input('name');
        $permission->save();
        return redirect(route('admin.permission'))->with('message',sprintf('Permission "%s" updated',  $permission->name));

    }

    public function delete($id){
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect(route('admin.permission'))->with('message',sprintf('Permission "%s" deleted', $permission->name));
    }
}
