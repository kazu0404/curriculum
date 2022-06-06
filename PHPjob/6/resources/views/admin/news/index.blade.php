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
                    <table class="table table-dark">
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ str_limit($post->body, 200) }}</td>
                                    <td>{{ str_limit($post->updated_at, 100) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>            
        
                    <!--
                    @foreach($posts as $post)
                        
                        
                        <h1 class="post_name">{{str_limit($post->name, 20)}}</h1>
                        

                        
                        
                        <p class="post_body">{{str_limit($posts->body, 200)}}</p>
                        <p class="post_updated_at">{{str_limit($posts->updated_at, 100)}}</p><
                        
                        
                    @endforeach
                    -->
        
    </div>
@endsection