<?php


namespace App\Helpers;


use App\Http\Controllers\Front\ImageControl;
use App\Models\Products;

class CartProductControl
{
    private static array $cart_product = array();

    public static function addToCart( $ProductId )
    {
        $product_db = Products::find( $ProductId );

        $product_obj = new Cart(
            $ProductId,
            ImageControl::get_image_url($product_db->file_id),
            $product_db->title,
            $product_db->regular_price ?? $product_db->price,
            1
        );

        self::$cart_product[] = $product_obj;
    }

    public static function removeFromCart( $productId ) : bool
    {
        $index = 0;
        if(is_array(self::$cart_product))
            foreach (self::$cart_product as $product ){
                if ( $product->getProductId() == $productId){
                    unset(self::$cart_product[$index]);
                    return true;
                }
                $index++;
            }
        return false;
    }


    public static function getCartProduct(): array
    {
        return self::$cart_product;
    }
}
