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
        //$this->validate($request, Users::$rules);
        
        $posts = new Posts;
        //$users = new Users;
        $form = $request->all();
        
        //$auth=auth()->user()->id;
        //$users=Users::find($auth);
        
        //$users_data = \DB::table('users')->get();
        //$users_name = $users_data->name[0];
        
        //$users_name = \Auth::user()->name;
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
                
        // データベースに保存する
        $posts->fill($form);
        //$users_name->fill($form);
        $posts->save();
        //$users_name->save();
        
        // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
    
    public function index(Request $request)
    {
        $posts = Posts::all();
        return view('admin.news.index', ['posts' => $posts]);
    }
    
}
    