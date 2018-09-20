<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = 'user_level';
    protected $primaryKey = 'id_user_level';
    public $timestamps = false;

    public function menu()
    {
        return $this->hasMany('App\Menu', 'id_user_level', 'id_user_level');
    }

    public function users()
    {
        return $this->hasMany('App\Users', 'id_user_level', 'id_user_level');
    }
}
