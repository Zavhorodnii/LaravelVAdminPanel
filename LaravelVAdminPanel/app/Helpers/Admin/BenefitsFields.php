<?php


namespace App\Helpers;


use App\Models\Benefits;
use App\Models\Files;

class BenefitsFields
{
    public static function get_db_fields(): array
    {
        $all_fields = Benefits::all();
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
                'textareaInput' => $items->title,
                'imageField' => $file,
            ];
            $index++;
        }
        return $fields;
    }
}
