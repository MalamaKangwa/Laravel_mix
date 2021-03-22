<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = '/storage/app/images/';


    protected $fillable = ['photo_path'];

    public function getPhotoPathAttribute($photo) {
        if($photo) {
            return $this->uploads.$photo;
        } else {
            return $this->uploads.'istockphoto.jpg';
        }
    }

}
