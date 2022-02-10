<?php


namespace App\Http\Controllers\Front;


use App\Models\Files;
use App\Models\Product_gallery;

class ImageControl
{
    public static function get_image_url($id) : string
    {
        $img_path = Files::find($id);
        if(isset($img_path)) {
            $url = $img_path->file_path;
        }else{
            $url = '#';
        }
        return $url;
    }

    public static function get_gallery_url( $id )
    {
        $product_gallery = Product_gallery::where('products_id', '=', $id)->get();;
        $index = 1;
        $item_fields['gallery'] = null;
        if( isset($product_gallery) ){
            foreach ( $product_gallery as $item ){
                $item_fields['gallery'][$index] = [
                    'file-id' => self::get_image_url($item->file_id),
                ];
                $index++;
            }
        }
        return $item_fields['gallery'];
    }
}
