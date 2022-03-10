<?php


namespace App\Helpers;


class GetCartProduct
{
    public static function getCartProduct(){
        $user_id = $_COOKIE['user_id'];
        \Cart::session($user_id);
        $cart_info['products'] = \Cart::getContent()->toArray();
        ksort($cart_info['products']);
        foreach ($cart_info['products'] as $key => &$product){
            $product['priceSum'] = \Cart::get($key)->getPriceSum();
        }
        $cart_info['subtotal'] = \Cart::getSubTotal();
        $cart_info['cartCount'] = \Cart::getContent()->count();

        return $cart_info;
    }
}
