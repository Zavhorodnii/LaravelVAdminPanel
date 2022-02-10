<?php


namespace App\Helpers;


use App\Http\Controllers\Front\ImageControl;
use App\Models\Product_features;
use App\Models\Product_set;
use App\Models\Products;

class GetRelatedProductInfo
{
    public static function get_product_info( $product_id )
    {
        $product = Products::find($product_id);
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

        $field_['products'] = [
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

        return $field_['products'];
    }
}
