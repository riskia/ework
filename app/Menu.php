<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public $timestamps = false;

    public function listmenu()
    {
        return $this->belongsToMany('App\ListMenu', 'id_list_menu', 'id_list_menu');
    }
    public function userlevel()
    {
        return $this->belongsTo('App\UserLevel', 'id_user_level', 'id_user_level');
    }
}
