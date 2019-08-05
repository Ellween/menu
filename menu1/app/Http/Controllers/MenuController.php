<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use DB;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('order')->get();
        return view('welcome',compact('menus'));
    }

    public function change(Request $request)
    {
        $menu = Menu::all();
        $length = $menu->count();
        $items = $request->item;

        for($i=1; $i<=$length; $i++)
        {
            $menu = Menu::find($i);
            $menu->order = $items[$i-1];
            $menu->save();
            
        }
        


        
        
    }
}
