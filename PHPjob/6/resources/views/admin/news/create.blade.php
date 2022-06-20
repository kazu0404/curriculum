@extends('layouts.admin')
@section('title', '投稿の新規作成')

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
</div>
@endsection