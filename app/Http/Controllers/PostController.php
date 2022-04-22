<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public static function ArticleBaru(Request $request)
    {
        $rules = [
            'title'     => ['required', 'min:20'],
            'content'   => ['required', 'min:200'],
            'category'  => ['required', 'min:3'],
            'status'    => ['required', 'in:publish,draft,thrash']
        ];      
        
        $msg = [
            'title.required'    => 'Title Wajib Diisi',
            'title.min'         => 'Minimal Pengisian Title Adalah 20 Karakter',
            'content.required'  => 'Content Wajib Diisi',
            'content.min'       => 'Minimal Pengisian Content Adalah 200 Karakter',
            'category.required' => 'Category Wajib Diisi',
            'category.min'      => 'Minimal Pengisian Category Adalah 3 Karakter',
            'status.required'   => 'Status Wajib Diisi',
            'status.in'         => 'Status Harus Diisi Dengan publish, draft, atau thrash',
        ];


        $validator = Validator::make($request->all(), $rules, $msg);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        try {
            $articelBaru = Post::create($request->all());
            return response()->json('Artikel Berhasil Ditambahkan');
        } catch (\Throwable $e) {
            return response()->json($e->getMessage());
        }
    }

    public static function SemuaArticle($limit = null, $offset = null)
    {
        $semuaArtikel = '';
        if($limit == null AND $offset == null)
        {
            $semuaArtikel = DB::table('posts')
            ->select(['title', 'content','category','status'])
            ->get();
        }
        else{            

            $semuaArtikel = DB::table('posts')
            ->select(['title', 'content','category','status'])
            ->limit($limit)
            ->offset($offset)
            ->get();
        }
        return response()->json($semuaArtikel);
    }

    public static function ArticleById($id)
    {
        $semuaArtikel = DB::table('posts')
        ->select('title', 'content','category','status')
        ->where('id', '=', $id)
        ->first();
        return response()->json($semuaArtikel);
    }

    public static function RubahArticle($id, Request $request)
    {
        $rules = [
            'title'     => ['required', 'min:20'],
            'content'   => ['required', 'min:200'],
            'category'  => ['required', 'min:3'],
            'status'    => ['required', 'in:publish,draft,thrash']
        ];
        
        $msg = [
            'title.required'    => 'Title Wajib Diisi',
            'title.min'         => 'Minimal Pengisian Title Adalah 20 Karakter',
            'content.required'  => 'Content Wajib Diisi',
            'content.min'       => 'Minimal Pengisian Content Adalah 200 Karakter',
            'category.required' => 'Category Wajib Diisi',
            'category.min'      => 'Minimal Pengisian Category Adalah 3 Karakter',
            'status.required'   => 'Status Wajib Diisi',
            'status.in'         => 'Status Harus Diisi Dengan publish, draft, atau thrash',
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        try {
            $articelBaru = Post::find($id);
            $articelBaru->update($request->all());
            return response()->json("Artikel Berhasil Diupdate");
        } catch (\Throwable $e) {
            return response()->json('Artikel tidak ditemukan');
        }
    }

    public static function HapusArticle($id)
    {
        try {
            $articelBaru = Post::find($id);
            $articelBaru->delete();
            return response()->json('Berhasil Hapus Artikel');
        } catch (\Throwable $e) {
            return response()->json('Artikel tidak ditemukan');
        }
    }
}
