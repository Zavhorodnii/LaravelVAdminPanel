<?php


namespace App\Helpers;


use App\Http\Controllers\Front\ImageControl;
use App\Http\Controllers\Front\VideoControl;
use App\Models\Files;
use App\Models\Product_addition_info;
use App\Models\Product_addition_info_item;
use App\Models\Product_category;
use App\Models\Product_features;
use App\Models\Product_gallery;
use App\Models\Product_related_products;
use App\Models\Product_set;
use App\Models\Product_video;
use App\Models\Products;
use App\Models\Сategory;

class GetProductInfo
{
    public static function get_product_info( $id, $slug = null ) : array
    {
        if( $slug ){
            $product = Products::where('slug', '=', $slug)->first();
            $id = $product->id;
        }else
            $product = Products::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['title'] = $product->title;
        $item_fields['slug'] = $product->slug;
        $item_fields['sku'] = $product->sku;
        $item_fields['price'] = $product->price;
        $item_fields['regular-price'] = $product->regular_price;
        $item_fields['weight'] = $product->weight;
        $item_fields['length'] = $product->length;
        $item_fields['width'] = $product->width;
        $item_fields['height'] = $product->height;
        $item_fields['dimensions'] = $product->dimensions;
        $item_fields['draft'] = $product->draft;
        $item_fields['features-title'] = $product->features_title;
        $item_fields['product-description-title'] = $product->description_title;
        $item_fields['product-description'] = $product->description;
        $item_fields['related-products-title'] = $product->related_products_title;
        $item_fields['related-products-description'] = $product->related_products_description;

        $img_path = Files::find($product->file_id);
        if(isset($img_path)) {
            $file = [
                'status' => 'ok',
                'id' => $product->file_id,
                'url' => $img_path->file_path,
            ];
        }else{
            $file = [
                'status' => 'error'
            ];
        }
        $item_fields['product-image'] = $file;

        $product_video = Product_video::where('products_id', '=', $id)->get();;
        $index = 1;
        if( isset($product_video) ){
            foreach ( $product_video as $item ){
                $item_fields['repeater-video'][$index] = [
                    'video-link' => $item->link,
                    'video-info' => VideoControl::get_youtube_video_info($item->link),
                ];
                $index++;
            }
        }

        $product_gallery = Product_gallery::where('products_id', '=', $id)->get();;
        $index = 1;
        if( isset($product_gallery) ){
            foreach ( $product_gallery as $item ){
                $img_path = Files::find($item->file_id);
                if(isset($img_path)) {
                    $file = [
                        'status' => 'ok',
                        'id' => $item->file_id,
                        'url' => $img_path->file_path,
                    ];
                }else{
                    $file = [
                        'status' => 'error'
                    ];
                }
                $item_fields['repeater-gallery'][$index] = [
                    'file-id' => $file,
                ];
                $index++;
            }
        }

        $product_features = Product_features::where('products_id', '=', $id)->get();;
        $index = 1;
        if( isset($product_features) ){
            foreach ( $product_features as $item ){
                $item_fields['repeater-features'][$index] = [
                    'product-feature-item' => $item->features,
                ];
                $index++;
            }
        }

        $related_products = Product_related_products::select('related_product_id')->where('products_id', '=', $id)->get();;
        $index = 1;
        if( isset($related_products) ){
            foreach ( $related_products as $item ){
                $item_fields['related-products'][$index] = Products::where('id', '=', $item->related_product_id)
                    ->get();
                $index++;
            }
        }

        if( isset($item_fields['related-products']) && is_array($item_fields['related-products']) ) {
            foreach ($item_fields['related-products'] as $item) {
                $item_fields['image-related-product'][$item[0]->id][] = ImageControl::get_image_url($item[0]->file_id);
                $item_fields['image-related-product'][$item[0]->id][] = ImageControl::get_gallery_url($item[0]->id);
            }
        }

        $set_products = Product_set::select('product_set')->where('products_id', '=', $id)->get();;
        $index = 1;
        if( isset($set_products) ){
            foreach ( $set_products as $item ){
                $item_fields['set-products'][$index] = Products::select('id', 'title')
                    ->where('id', '=', $item->product_set)
                    ->get();
                $index++;
            }
        }

        $product_categories = Product_category::select('сategories_id')->where('products_id', '=', $id)->get();;
        $index = 1;
        if( isset($product_categories) ){
            foreach ( $product_categories as $item ){
                $item_fields['category'][$index] = Сategory::select('id', 'title')
                    ->where('id', '=', $item->сategories_id)
                    ->get();
                $index++;
            }
        }

        $product_addition_info = Product_addition_info::where('products_id', '=', $id)->get();;
        $index = 1;
        if( isset($product_addition_info) ){
            foreach ( $product_addition_info as $item ){
                $item_fields['repeater-addition'][$index] = [
                    'title-addition-info' => $item->title,
                ];

                $product_addition_info_item = Product_addition_info_item::where('product_addition_infos_id', '=', $item->id)->get();;
                $index_2 = 1;
                if( isset($product_addition_info_item) ){
                    foreach ( $product_addition_info_item as $item_second ){
                        $item_fields['repeater-addition'][$index]['repeater-addition-item'][$index_2] = [
                            'title-addition-info-item' => $item_second->title,
                            'value-addition-info-item' => $item_second->value,
                        ];
                        $index_2++;
                    }
                }

                $index++;
            }
            $item_fields['midl_count'] = ceil(($index-1)/2);
        }

//        dd($item_fields);

        return $item_fields;
    }
}
