<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\Wilayah;

class ZonaController extends Controller
{
    public function index() {   
        $menu = session('menunya');


        
        return view('dashboard/zona', ['title' => 'Zona', 'menu' => $menu] );
    }

    public function addwilayah(Request $data) {
        $wilayah = new wilayah;
        $wilayah->nama_wilayah = $data->namawilayah;
        $wilayah->save();
    }

    public function menu() {
        $menu = session('menunya');
        $allmenu = \App\ListMenu::all();
        $data = \App\ListMenu::orderBy('list_menu.list_menu_id', 'asc')
                    ->leftjoin('menu', 'list_menu.list_menu_id', '=', 'menu.list_menu_id')
                    ->get([
                        'list_menu.list_menu_id',
                        'list_menu.nama_menu',
                        'list_menu.link_menu',
                        'list_menu.icon_menu',
                        'menu.user_level_id'
                    ]);
        return view('dashboard/menu', ['title' => 'Menu', 'menu' => $menu, 'data' => $data, 'allmenu' => $allmenu]);
    }

    public function addmenu(Request $menudata) {
        $data = DB::table('list_menu')
                    ->insert([
                        ['nama_menu' => $menudata->namamenu
                        ,'link_menu' => $menudata->linkmenu
                        ,'icon_menu' => $menudata->iconmenu]
                    ]);
        return redirect('/menu')->with('alert','Adding Success');

    }

    public function addusermenu(Request $menudatas) {
        // for ($i=0; $i<count($menudatas->menus); $i++)
        // {
        //     for($j=0; $j<count($menudatas->menus); $j++)
        //     {
        //         if(isset($menudatas->menu[$j]) && $ok=($menudatas->menus[$i] === $menudatas->menu[$j]))
        //         {
        //             DB::table('menu')
        //                 ->where('id_list_menu', $menudatas->menus[$i])
        //                 ->update([$menudatas->userlevel => '1']);
        //             break;
        //         }
        //         {
        //             DB::table('list_menu')
        //                 ->where('id_list_menu', $menudatas->menus[$i])
        //                 ->update([$menudatas->userlevel => null]);
        //         }
        //     }
        // }
            // dd($menudatas->userlevel);
        for ($i=0; $i<count($menudatas->menus); $i++) {
            for($j=0; $j<count($menudatas->menus); $j++) {
                if(isset($menudatas->menu[$j]) && $ok=($menudatas->menus[$i] === $menudatas->menu[$j])) {
                    $check = DB::table('menu')
                            ->where([
                                ['list_menu_id', '=', $menudatas->menus[$i]],
                                ['user_level_id', '=', $menudatas->userlevel]
                                ])
                            ->get();
                                // dd($check);
                    if($check = '0') {
                        // DB::table('menu')->insert([
                        //     ['id_list_menu' => $menudatas->menus[$i], 'id_user_level' => $menudatas->userlevel[0]]
                        // ]);
                        echo 'add'.$menudatas->menus[$i].'|'.$menudatas->menu[$j].'<br>';
                        break;
                    }
                    else {
                        echo 'stop<br>';
                        break;
                    }
                }
                else {
                    // DB::table('menu')->where([
                    //     ['id_list_menu', '=', $menudatas->menus[$i]],
                    //     ['id_user_level', '=', $menudatas->userlevel[0]]]
                    // )->delete();
                    echo 'del'.$menudatas->menus[$i].'<br>';
                    break;
                }
            }
        }
        // return redirect('/menu')->with('alert','Adding menu to user Success');
    }
}