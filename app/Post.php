<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Category;
use App\PostStat;
use DB;
use Illuminate\Notifications\Notifiable;
class Post extends Model
{
    //
    use SoftDeletes;
    use Notifiable;

    public function getStatusAttribute(){
        return $this->post_status;
    }

    public function setPostStatusAttribute($value){
        $this->attributes['post_status']= strtolower($value);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault([
            'id' =>0,
            'name'=> 'Uncategorized',
        ]);
    }

    public function stat(){
        return $this->hasOne(PostStat::class,'post_id')->withDefault([
            'views' => 0,
            'comment' => 0,
            'likes' => 0,
        ]);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag','post_id','tag_id');
    }

    public function relatedPosts(){
        $posts = DB::table('posts')->select('posts.*')
                ->distinct()
                ->join('post_tag','posts.id','=','post_tag.post_id')
                ->whereIn('post_tag.tag_id',$this->tags->pluck('id')->toArray())
                ->where('posts.id', '<>' , $this->id)
                ->get();
        return $posts;
    }
}
