@extends('layouts.admin')
@section('title', '登録済みの投稿一覧')

@section('content')
    <div class="container">
        
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ホーム</h2>
                <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            
                            <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                            
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            
                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body" placeholder="いまどうしてる？">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="つぶやく">
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table-sns">
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <!--<h1 class="name_sns">{{ Auth::user()->name }}</h1>-->
                                    <th class="sns-name">{{ $post->name }}</th>
<!--                                <td class="sns-body">{{ str_limit($post->body, 200) }}</td>-->
                                    <td class="sns-time">{{ str_limit($post->updated_at, 100) }}</td>
<!--                                <td> <a class="sns-delete" href="{{ action('Admin\NewsController@delete', ['id' => $post->id]) }}">削除</a></td>-->
                                </tr>
                            
                                <tr class="sns-td">
                                    <!--<h1 class="name_sns">{{ Auth::user()->name }}</h1>-->
                                    <td class="sns-body">{{ str_limit($post->body, 200) }}</td>
                                    @if (strcmp($post->name, Auth::user()->name) == 0)
                                        <td> <a class="sns-delete" href="{{ action('Admin\NewsController@delete', ['id' => $post->id]) }}">削除</a></td>
                                    @endif
                                    <br>
                                </tr>
                            
                                                                                    
<!--                            <a class="sns-item" href="{{ action('Admin\NewsController@delete', ['id' => $post->id]) }}">削除</a>-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>            
    </div>
@endsection