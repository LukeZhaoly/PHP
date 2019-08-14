<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates=['published_at'];

    //标题赋值，以及slug属性的取值
    public function setTitleAttribute($value){
        $this->attributes['title']=$value;
        if (!$this->exists){
            $this->attributes["slug"]=str_slug($value);
        }
    }
}
