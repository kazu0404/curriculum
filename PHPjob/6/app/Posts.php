<?php

namespace app\Posts;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'body' => 'required',
    );
}
