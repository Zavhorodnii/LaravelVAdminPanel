<?php


namespace App\Http\Controllers\Front;

use App\Models\Files;
use App\Models\Product_video;
use App\Models\Products;

class Gift extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        $all_gifts = \App\Helpers\GiftFields::get_db_fields();

        self::$fields['title'] = $all_gifts['title'];
        self::$fields['date-finish'] = date("d.m.Y", strtotime($all_gifts['date-finish']));
        foreach ($all_gifts['repeater-price'] as &$gift){
            self::$fields['price'][] = $gift['price'];
            if( is_array($gift['repeater-product'])){
                foreach ( $gift['repeater-product'] as &$item){
                    $product = Products::where('id', '=', $item['id'])->first();
                    $img_path = Files::find($product->file_id);
                    if(isset($img_path)) {
                        $url = $img_path->file_path;
                    }else{
                        $url = null;
                    }
                    $item['image'] = $url;
                    $product_video = Product_video::where('products_id', '=', $item['id'])->first();;
                    if( isset($product_video) ){
                        parse_str( parse_url( $product_video->link, PHP_URL_QUERY ), $my_array_of_vars );
                        if ( !isset($my_array_of_vars['v'])){
                            $arr = explode('/', $product_video->link);
                            $item['video-id'] = end($arr);
                        }
                        else
                            $item['video-id'] = $my_array_of_vars['v'];
                        $item['youtube_thumbnail'] = 'https://img.youtube.com/vi/' . $item['video-id'] . '/sddefault.jpg';
                    }
                    else
                        $item['video'] = null;

                    if($product->regular_price != null){
                        $item['price'] = $product->regular_price;
                    } else{
                        $item['price'] = $product->price;
                    }
                    self::$fields['product'][] = $item;
                }
                break;
            }
        }
        return self::$fields;
    }
}
