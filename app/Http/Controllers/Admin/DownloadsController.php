<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Download;
use Auth;


class DownloadsController extends Controller
{
    //
    public function index(){
        return view('admin.downloads.index',[
            'downloads' =>Download::paginate(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required | max:255',
            'file' => 'required',
        ]);
        Download::create([
            'name' =>$request->post('name'),
            'filepath' => $request->file('file')->store('downloads'),
            'mimetype' =>$request->file('file')->getClientMimeType(),
            'user_id' => $request->user()->id,
            'size' => $request->file('file')->getClientSize(),
        ]);

        return redirect()->action('Admin\DownloadsController@index')->with('success', 'File Created !');
    }

    public function download($id){
        $download = Download::findOrFail($id);
        $ext= pathinfo(storage_path('app/'. $download->filepath),PATHINFO_EXTENSION);
        if(Auth::id() !== $download->user_id){
            abort(403);
        }
        $download->increment('downloads',1);
        return Storage::download($download->filepath , $download->name . '.'  . $ext);
        //return response()->download(storage_path('app/'. $download->filepath),$download->name.'.' .$ext);
    }

    public function preview($id){
        $download = Download::findOrFail($id);
        $download->increment('downloads', 1);
        return response()->file(storage_path('app/' . $download->filepath));
    }

    public function delete($id){
        $download =Download::findOrFail($id);
        $download->delete();
        Storage::delete($download->filepath);
        return redirect()->action('Admin\DownloadsController@index')->with('success', 'File Deleted !');
    }
}
