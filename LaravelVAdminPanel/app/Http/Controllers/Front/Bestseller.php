<?php


namespace App\Http\Controllers\Front;


use App\Helpers\BestsellerFields;
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
            $product = Products::find($field[0]->id);
            $features['features'] = [];
            $product_features = Product_features::where('products_id', '=', $product->id)->get();;
            $index = 1;
            if( isset($product_features) ){
                foreach ( $product_features as $item ){
                    $features['features'][$index] = [
                        'item' => $item->features,
                    ];
                    $index++;
                }
            }
            $set_products = Product_set::select('product_set')->where('products_id', '=', $product->id)->get();;
            $index = 1;
            $set_fields['set'] = null;
            if( isset($set_products) ){
                foreach ( $set_products as $item ){
                    $set = Products::find($item->product_set);

                    $set_fields['set'][$index] = [
                        'title'         => $set->title,
                        'price'         => $set->regular_price ?? $set->price,
                        'slug'          => $set->slug,
                        'image'         => ImageControl::get_image_url($set->file_id),
                    ];
                    $index++;
                }
            }

            $field_['products'][] = [
                'title'         => $product->title,
                'price'         => $product->price,
                'regular_price' => $product->regular_price,
                'slug'          => $product->slug,
                'image'         => ImageControl::get_image_url($product->file_id),
                'gallery'       => ImageControl::get_gallery_url($product->id),
                'features_title'=> $product->features_title,
                'features'      => $features['features'],
                'set'           => $set_fields['set'],
            ];
        }
        $all_fields['related-products'] = $field_['products'];

        return self::$fields = $all_fields;
    }
}
