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
        $items = $request->items;

        $length = sizeOf($items);


       for($x =0; $x <=$length; $x++)
       {
            $ids = $items[$x]['children'][0]['id'];
            dd($ids);
       }



      
       

       



        for($i=1; $i<=$length; $i++)
        {
            Menu::where('id', $items[$i-1])->update(['order' => $i]);
            
        }
        


        
        
    }
}
