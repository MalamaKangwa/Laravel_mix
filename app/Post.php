<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id','photo_id','title','post_content'];

    public function posts_user() {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function posts_photo(){
        return $this->belongsTo('App\Photo','photo_id','id');
    }

    public function posts_category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
}
