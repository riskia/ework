<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListMenu extends Model
{
    protected $table = 'list_menu';
    protected $primarykey = 'list_menu_id';
    public $timestamps = false;

    public function menu()
    {
        return $this->hasMany('App\Menu', 'list_menu_id', 'list_menu_id');
    }

}
