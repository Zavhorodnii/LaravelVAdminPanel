<?php


namespace App\Helpers;


use App\Models\Bestseller;
use App\Models\Bestseller_product;
use App\Models\Products;

class BestsellerFields
{
    public static function get_fields($post_id) : array
    {
        $product = Bestseller::find($post_id);
        $item_fields['post_id'] = $post_id;
        $item_fields['title'] = $product->title;
        $item_fields['all-text-title'] = $product->all_text_title;
        $item_fields['all-text-link'] = $product->all_text_link;
        $item_fields['draft'] = $product->draft;
        $item_fields['slider-block'] = $product->slider_block;

        $related_products = Bestseller_product::select('products_id')->where('bestsellers_id', '=', $post_id)->get();;
        $index = 1;
        if( isset($related_products) ){
            foreach ( $related_products as $item ){
                $item_fields['related-products'][$index] = Products::select('id', 'title')
                    ->where('id', '=', $item->products_id)
                    ->get();
                $index++;
            }
        }

        return $item_fields;
    }
}
