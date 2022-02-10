<?php

//namespace App\Http\Controllers\Admin\Support_files\Get_fields_val;

use App\Models\Files;

function get_fields_val($request){
    $return_item_page = array();
    foreach ($request->input() as $key => $item){
        $return_item_page = create_fields_array(explode('_', $key), $item, $return_item_page);
    }
    return $return_item_page;
}

function create_fields_array($fields, $value, &$return_item_page, $get_image_info = false){
    if(count($fields) != 0 ){
        if(strpos(strval($fields[0]), 'imageField') != ''){
            $get_image_info = true;
        }
        $return_item_page[$fields[0]] =
            create_fields_array( array_slice($fields, 1), $value,$return_item_page[$fields[0]], $get_image_info);
        return $return_item_page;
    } else{
        if($get_image_info){
            $img_path = Files::find($value);
            if(isset($img_path)) {
                return $value;
//                    return [
//                        'status' => 'ok',
//                        'id' => $value,
//                        'url' => $img_path->file_path,
//                    ];
            }else{
                return [
                    'status' => 'error'
                ];
            }
        }
        return $value;
    }
}

function create_catalog_view($catalog, $set, $prefix = '', $parent_id = null){
    foreach ($catalog as $item){
        if( $item->сategories_id == $parent_id ){
            $set[] = [
                'id' => $item->id,
                'title' =>$prefix . $item->title,
            ];
            $set = create_catalog_view($catalog, $set, $prefix . '— ', $item->id);
        }
    }
    return $set;
}

function create_menu_struct($menu_ob, $menu, $index = 0, $parent_id = null){
    foreach ($menu_ob as $item){
        if( $item->site_menus_id == $parent_id ){
            $index++;
            $menu[$index] = [
                'id' => $item->id,
                'title' => $item->title,
                'url' => $item->url,
                'new' => create_menu_struct($menu_ob, [], 0, $item->id),
            ];
        }
    }
    return empty($menu) ? null : $menu;
}
