<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * @method static lists(string $string, string $string1)
 */
class Role extends Model
{
    protected $fillable = ['name'];

    public function user(){
        return $this->hasMany('App\User');
    }
}
