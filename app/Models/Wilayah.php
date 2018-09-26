<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    protected $primarykey = 'wilayah_id';

    public $timestamps = false;

    public function area() {
        return $this->hasMany('App\Models\Area', 'wilayah_id', 'wilayah_id');
    }
}
