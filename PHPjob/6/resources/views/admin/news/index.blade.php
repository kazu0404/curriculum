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
                    <table class="table-sns">
                        <tbody>
                            @foreach($posts as $post)
                                <tr class="sns-td">
                                    <th class="sns-name">{{ $post->name }}</th>
                                    <td class="sns-time">{{ str_limit($post->updated_at, 100) }}</td>
                                </tr>
                            
                                <tr class="sns-td">
                                    <td class="sns-body">{{ str_limit($post->body, 255) }}</td>
                                    @if (strcmp($post->name, Auth::user()->name) == 0)
                                        <td class="sns-deletetable"> <a class="sns-delete" href="{{ action('Admin\NewsController@delete', ['id' => $post->id]) }}">削除</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection