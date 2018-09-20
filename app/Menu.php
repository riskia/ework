<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public $timestamps = false;

    public function listmenu()
    {
        return $this->belongsToMany('App\ListMenu', 'list_menu_id', 'list_menu_id');
    }
    public function userlevel()
    {
        return $this->belongsToMany('App\UserLevel', 'user_level_id', 'user_level_id');
    }
}
