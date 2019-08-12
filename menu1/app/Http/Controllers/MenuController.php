<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use DB;

class MenuController extends Controller
{
    public function index()
    {
        $t = [];
        $menus = Menu::orderBy('order')->get();
       
        return view('welcome',compact('menus'));
    }

    public function change(Request $request)
    {
        $items = $request->items;

        $length = sizeOf($items);


        

        for($i=1; $i<=$length; $i++)
        {
            if(isset($items[$i-1]['children'])){

               $t =  Menu::find($items[$i-1]['children'][0]['id']);
               $t->parent_id = $items[$i-1]['id'];
               $t->save();
            }

            Menu::where('id', $items[$i-1])->update(['order' => $i]);
            
        }
        


        return $items;

        
        
    }
}
