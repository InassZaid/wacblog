<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('admin.notifications',[
            'notifications' => $user->notifications,
        ]);
    }
}
