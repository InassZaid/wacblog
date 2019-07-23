<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    //
    protected $fillable=[
        'name','filepath', 'mimetype','user_id','size' ,'downloads'
    ];
    
}
