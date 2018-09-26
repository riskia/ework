<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function userlevel()
    {
        return $this->BelongsTo('App\UserLevel', 'user_level_id', 'user_level_id');
    }

    public function rayon() {
        return $this->BelongsTo('App\Rayon', 'rayon_id', 'rayon_id');
    }
}
