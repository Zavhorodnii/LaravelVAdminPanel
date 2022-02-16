<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Admin\Controller;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartControl(Request $request){

        $product_id = trim($request->input('product_id'));


        $cookie = array();
        if( $request->hasCookie('product_id'))
            $cookie = explode('&', $request->cookie("product_id"));
        if(!in_array(strval($product_id), $cookie)){
            $cookie[] = $product_id;
            $cookie_control = 'ok';
        } else{
            $index = array_search($product_id, $cookie);
            unset($cookie[$index]);
            $cookie_control = 'remove';
        }

        return response()
            ->json([
                'status'            => 'ok',
                'cookie_control'    => $cookie_control
            ])
            ->cookie("product_id",
                implode('&', $cookie),
                time() + 3600 * 24 * 365
            );
    }

    public function changeQuantity(Request $request){

    }

    public function order(Request $request){

    }
}
