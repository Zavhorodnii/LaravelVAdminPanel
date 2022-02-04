<?php


namespace App\Helpers;


use App\Models\Files;
use App\Models\GalleryImage;
use App\Models\GalleryTitle;

class GetGalleryField
{
    public static function get_db_fields() : array
    {
        $all_fields = GalleryImage::all();
        $title_block = GalleryTitle::all();
        $fields = array();
        $index = 1;
        if(isset($title_block[0])) {
            $fields['title'] = $title_block[0]->title;
            $fields['description'] = $title_block[0]->description;
        }
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
                'file-id' => $file,
            ];
            $index++;
        }
        return $fields;
    }
}
