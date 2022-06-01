<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use app\Http\Controllers\Controller;
use app\Posts;
use app\Users;

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
    }  
}
    