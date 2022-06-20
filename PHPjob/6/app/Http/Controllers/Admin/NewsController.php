<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Users;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }
    
    public function create(Request $request)
    {   
        // Varidationを行う
        $this->validate($request, Posts::$rules);
        
        $posts = new Posts;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $posts->fill($form);
        $posts->save();
        
        // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
        
        //return redirect('admin/news/');
    }
    
    public function index(Request $request)
    {
        //$posts = Posts::all();
        $posts = Posts::all()->sortByDesc("id");
        
        return view('admin.news.index', ['posts' => $posts]);
        //return redirect('admin/news/');
    }
    
    public function edit(Request $request)
    {
        // Posts Modelからデータを取得する
        $posts = Posts::find($request->id);
        if (empty($posts)) {
            abort(404);    
        }
        return view('admin.news.edit', ['posts_form' => $posts]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Posts::$rules);
        // Posts Modelからデータを取得する
        $posts = Posts::find($request->id);
        // 送信されてきたフォームデータを格納する
        $posts_form = $request->all();
        unset($posts_form['_token']);
        
        // 該当するデータを上書きして保存する
        $posts->fill($posts_form)->save();
        
        return redirect('admin/news');
    }
    
    public function delete(Request $request)
    {
        // 該当するPosts Modelを取得
        $posts = Posts::find($request->id);
        // 削除する
        $posts->delete();
        return redirect('admin/news/');
    }  
    
}
    