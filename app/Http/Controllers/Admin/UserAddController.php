<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use App\UserPermission;

class UserAddController extends Controller
{
    //
    public function index(){

        return view('admin.UserPermission.alluser')->with([
        'Users'=> User::where('admin',1)->paginate(10),
      ]);

    }


    public function destroy($id){

        $user=User::findOrfail($id);
    
        $user->delete();
        return redirect(route('admin.user.index'))
        ->with('message',sprintf('User "%s" deleted!',$user->name));
    
    }

    public function showAddUserForm()
    {
        return view('admin.UserPermission.adminadd');
    }

    protected function create(Request $request)
    {

        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'lastname' => ['required', 'string', 'max:255'],
            'avatar' => ['image'],
            'birthday' => ['date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'bio' => ['required', 'string', 'max:255'],
                ]);


        $request = request();
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar')->store('avatars', 'public');
        }else{
            $avatar= null;
        }
        
         $user= User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'birthday' =>$request->input('birthday'),
            'country' => $request->input('country'),
            'avatar' =>$avatar,
            'username' =>$request->input('username'),
            'lastname' =>$request->input('lastname'),
            'bio' => $request->input('bio'),
            'admin' => '1',


        ]);

        $user->save();
        $perms = $request->post('perm');
        foreach($perms as $per_id){
            $userper = UserPermission::create([
                'user_id' => $user->id,
                'permission_id' => $per_id,
            ]);
        }
            
        return redirect(route('admin.user.index'))
        ->with('message',sprintf('User "%s" Added!',$user->name));
    }

}
