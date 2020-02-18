<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }
}
