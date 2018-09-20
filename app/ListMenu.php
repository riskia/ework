<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListMenu extends Model
{
    protected $table = 'list_menu';
    protected $primarykey = 'id_list_menu';
    public $timestamps = false;

    public function menu()
    {
        return $this->hasMany('App\Menu', 'id_list_menu', 'id_list_menu');
    }

}
