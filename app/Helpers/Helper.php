<?php

namespace App\Helpers;

use App\Models\Menu;

class Helper
{

    public static function test()
    {
        $Menu = Menu::all();
        foreach($Menu->where('parent_id',0) as $Menus){            
            $data[] = $Menus;
            foreach($data as $item){
                $itemku[] = $item;
            }
            // if ($Menus->parent_id == $Menus->id);
        }

        return response()->json($data) ;
    }
}
