<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';
    protected $timestamp = false;
    protected $fillable=['comment' , 'name' , 'post_id']; 
}
