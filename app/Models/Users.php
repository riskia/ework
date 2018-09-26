<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function userlevel()
    {
        return $this->BelongsTo('App\Models\UserLevel', 'user_level_id', 'user_level_id');
    }

    public function rayon() {
        return $this->BelongsTo('App\Models\Rayon', 'rayon_id', 'rayon_id');
    }
}
