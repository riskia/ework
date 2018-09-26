<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $table = 'rayon';
    protected $primarykey = 'rayon_id';

    public $timestamps = false;

    public function area() {
        return $this->BelongsTo('App\Models\Area', 'area_id', 'area_id');
    }

    public function user() {
        return $this->hasMany('App\Models\Users', 'rayon_id', 'rayon_id');
    }
}
