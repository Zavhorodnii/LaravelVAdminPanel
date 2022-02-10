<?php


namespace App\Helpers;


use App\Models\Files;

class Guarantees
{
    public static function get_db_fields() : array
    {
        $all_fields = \App\Models\Guarantees::all();
//        var_export($all_fields);
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items){
            $img_path = Files::find($items->file_id);
            if(isset($img_path)) {
                $file = [
                    'status' => 'ok',
                    'id' => $items->file_id,
                    'url' => $img_path->file_path,
                ];
            }else{
                $file = [
                    'status' => 'error'
                ];
            }
            $fields[$index] = [
                'inputField' => $items->title,
                'imageField' => $file,
                'textareaInput' => $items->description,
            ];
            $index++;
        }
        return $fields;
    }
}
