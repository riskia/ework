<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $primarykey = 'area_id';

    public $timestamps = false;

    public function wilayah() {
        return $this->BelongsTo('App\Wilayah', 'wilayah_id', 'wilayah_id');
    }

    public function rayon() {
        return $this->hasMany('App\Rayon', 'area_id', 'area_id');
    }
}
