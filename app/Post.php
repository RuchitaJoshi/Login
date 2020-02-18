<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Photo;
use App\Comment;
use App\Category;

class Post extends Model
{

//    use Sluggable;
//    use SluggableScopeHelpers;

    protected $fillable = [
      'user_id',
      'category_id',
      'photo_id',
      'title',
      'content'
    ];


//    public function sluggable() {
//        return [
//            'slug' => [
//                'source' => 'title',
//            ],
//            'alternate' => [
//                'source' => 'subtitle',
//            ]
//        ];
//    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
