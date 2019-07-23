<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Category extends Model
{
    //
    protected $table = 'categories';
    public $timestamps = true;
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    const CREATED_AT= 'created_at';
    const UPDATED_AT = 'updated_at';

    public function posts(){
        return $this->hasMany(Post::class,'category_id','id');
    }
}
