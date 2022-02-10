<?php


namespace App\Http\Controllers\Front;


use App\Helpers\BestsellerFields;
use App\Helpers\GetRelatedProductInfo;
use App\Models\Files;
use App\Models\Product_features;
use App\Models\Product_gallery;
use App\Models\Product_set;
use App\Models\Products;

class Bestseller extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        $all_fields = BestsellerFields::get_fields($post_id);
        $field_ = array();
        foreach ($all_fields['related-products'] as $field){
            $field_['products'][] = GetRelatedProductInfo::get_product_info($field[0]->id);
        }
        $all_fields['related-products'] = $field_['products'];

        return self::$fields = $all_fields;
    }
}
