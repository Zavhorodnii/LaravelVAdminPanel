<?php


namespace App\Http\Controllers\Front;

use App\Models\Products;

class GiftSet extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields = \App\Helpers\GiftSet::get_db_fields();
        foreach (self::$fields['repeater-set'] as &$set){
            $product = Products::find($set['product-id']);
            $set['price']           = $product->price;
            $set['regular_price']   = $product->regular_price;
            $set['image']           = ImageControl::get_image_url($product->file_id);
        }

        return self::$fields;
    }
}
