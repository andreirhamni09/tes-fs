<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PostPageController extends Controller
{
    public static function index()
    {
        return view('post');
    }

    public static function allpost($trashed = null)
    {

        //status in:publish,draft,thrash
        $publish = DB::table('posts')
        ->where('status', 'publish')
        ->get();

        $draft = DB::table('posts')
        ->where('status', 'draft')
        ->get();        

        $thrash = DB::table('posts')
        ->where('status', 'thrash')
        ->get();
            
        return view('allpost', ['publish' => $publish, 'draft' => $draft, 'thrash' => $thrash]);
    }
    public static function hapus($id, Request $request)
    {
        $title      = $request->input("title".$id."");
        $content    = $request->input("content".$id."");    
        $category   = $request->input("category".$id."");    
        $status     = $request->input("status".$id."");

        $trashed    = json_decode(Http::post("http://localhost/tes/Tes PT Sharing Vision Indonesia/BE/api/article/$id", ['title' => $title, 'content' => $content, 'category' => $category, 'status' => $status]));
        if($trashed == 'Artikel Berhasil Diupdate')
        {
            return redirect()->back()->with('trashed', 'Berhasil Update');
        }
        else
        {
            return redirect()->back()->with('trashed', "Gagal Update");
        }
    } 


    public static function editpost($id)
    {
        $getpost = json_decode(Http::get("http://localhost/tes/Tes PT Sharing Vision Indonesia/BE/api/article/$id"), true);
        return view('editpost', ['getpost' => $getpost, 'id' => $id]);
    }
    
    public static function addnew()
    {
        return view('tambahbaru');
    }
    
    public static function preview()
    {
        $publish = DB::table('posts')
        ->where('status', 'publish')
        ->paginate(6);
        return view('preview', compact('publish'));
    }
    
}
