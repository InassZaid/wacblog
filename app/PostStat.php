<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostStat extends Model
{
    //
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable=['post_id','views'];
    protected $primaryKey = 'post_id';
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }

}
