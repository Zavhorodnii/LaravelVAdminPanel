<?php


namespace App\Helpers;


use App\Models\CatalogItems;
use App\Models\Files;

class Catalog
{
    public static function get_fields($id) : array
    {
        $catalog = \App\Models\Catalog::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['title'] = $catalog->title;
        $item_fields['description'] = $catalog->description;
        $item_fields['draft'] = $catalog->draft;
        $item_fields['show_top'] = $catalog->show_top;
        $item_fields['important_title'] = $catalog->important_title;
        $item_fields['important_link'] = $catalog->important_link;

        $catalog_item = CatalogItems::where('catalog_id', '=', $id)->get();;

        $index = 1;
        foreach ($catalog_item as $items){
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
            $item_fields['repeater'][$index] = [
                'title' => $items->title,
                'file-id' => $file,
                'page-link' => $items->page_link,
                'top_title' => $items->top_title,
                'top_link' => $items->top_link,
            ];
            $index++;
        }
        return $item_fields;
    }

}
