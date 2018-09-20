<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckUserMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userlevel = session('user_level');
        if($userlevel != '1')
        {
            $menu = DB::table('menu')
                    ->join('list_menu', 'list_menu.list_menu_id', '=', 'menu.list_menu_id')
                    ->where([['link_menu', \Request::path()]
                            ,['user_level_id', $userlevel]
                    ])
                    ->get();
            
            if (count($menu) < 1) {
                // user value cannot be found in session
                Session::flush();
                return redirect('/')->with('alert','Permission Denied, Please Login');
            }
        }
        return $next($request);
    }
}
