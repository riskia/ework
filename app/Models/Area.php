<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $primarykey = 'area_id';

    public $timestamps = false;

    public function wilayah() {
        return $this->BelongsTo('App\Models\Wilayah', 'wilayah_id', 'wilayah_id');
    }

    public function rayon() {
        return $this->hasMany('App\Models\Rayon', 'area_id', 'area_id');
    }
}
