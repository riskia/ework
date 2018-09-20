<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    public function userlevel()
    {
        return $this->BelongsTo('App\UserLevel', 'id_user_level', 'id_user_level');
    }
}
