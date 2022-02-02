<?php


namespace App\Helpers;


use App\Models\Files;
use App\Models\HowWeWorkItems;
use App\Models\HowWeWorkTitle;

class HowWeWork
{
    public static function get_db_fields(): array
    {
        $all_fields = HowWeWorkItems::all();
        $title_block = HowWeWorkTitle::all();
        $fields = array();
        $index = 1;
        if(isset($title_block))
            $fields['title'] = $title_block[0]->title;
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
                'title' => $items->title,
                'file-id' => $file,
                'description' => $items->description,
            ];
            $index++;
        }
        return $fields;
    }
}
