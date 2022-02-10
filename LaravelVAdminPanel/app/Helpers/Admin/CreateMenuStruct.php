<?php


namespace App\Helpers;


class CreateMenuStruct
{
    public static function create_menu_struct($menu_ob, $menu, $index = 0, $parent_id = null){
        foreach ($menu_ob as $item){
            if( $item->site_menus_id == $parent_id ){
                $index++;
                $menu[$index] = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'url' => $item->url,
                    'new' => self::create_menu_struct($menu_ob, [], 0, $item->id),
                ];
            }
        }
        return empty($menu) ? null : $menu;
    }
}
