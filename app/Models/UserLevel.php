<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = 'user_level';
    protected $primaryKey = 'user_level_id';
    public $timestamps = false;

    public function menu() {
        return $this->hasMany('App\Models\Menu', 'user_level_id', 'user_level_id');
    }

    public function users() {
        return $this->hasMany('App\Models\Users', 'user_level_id', 'user_level_id');
    }
}
