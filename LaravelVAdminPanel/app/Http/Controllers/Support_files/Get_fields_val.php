<?php


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
