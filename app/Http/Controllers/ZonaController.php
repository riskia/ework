<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;

use App\Wilayah;
use App\Area;
use App\Rayon;

class ZonaController extends Controller
{
    public function index() {   
        $menu = session('menunya');
        $wilayah = wilayah::all();
        $area = area::with('wilayah')->get();
        $rayon = rayon::with(['area' => function($query){
            return $query->with('wilayah');
        }])->get();
        return view('dashboard/zona', ['title' => 'Zona',
                                        'menu' => $menu,
                                        'wilayah' => $wilayah,
                                        'area' => $area,
                                        'rayon' => $rayon
                                        ]);
    }

    public function addwilayah(Request $data) {
        $wilayah = new wilayah;
        $wilayah->nama_wilayah = $data->namawilayah;
        $wilayah->save();
        return redirect('/zona');
    }

    public function addarea(Request $data) {
        $area = new area;
        $area->nama_area = $data->namaarea;
        $area->wilayah_id = $data->wilid;
        $area->save();
        return redirect('/zona');
    }

    public function addrayon(Request $data) {
        $rayon = new rayon;
        $rayon->nama_rayon = $data->namarayon;
        $rayon->area_id = $data->areaid;
        $rayon->save();
        return redirect('/zona');
    }
}