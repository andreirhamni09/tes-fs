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
       

        if($trashed !== null){
            return view('allpost', ['publish' => $publish, 'draft' => $draft, 'thrash' => $thrash, 'trashed' => 1]);
        }
        else{
            return view('allpost', ['publish' => $publish, 'draft' => $draft, 'thrash' => $thrash, 'trashed' => 0]);
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
