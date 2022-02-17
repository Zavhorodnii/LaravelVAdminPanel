<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Admin\Controller;

use App\Http\Controllers\Front\ImageControl;
use App\Models\Products;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AddCartController extends Controller
{
    public function cartControl(Request $request){

        $product_id = trim($request->input('product_id'));
        $Product = Products::find($product_id);


        if (!\Cart::has($product_id)){
            \Cart::add([
                'id' => strval($Product->id),
                'name' => $Product->title,
                'price' => $Product->regular_price ?? $Product->price,
                'quantity' => 1,
                'attributes' => array(
                    'image'     => ImageControl::get_image_url($Product->file_id),
                    'slug'      => $Product->slug
                ),
                'associatedModel' => $Product
            ]);

            $cookie_control = 'add';
        }
        else {
            \Cart::remove($product_id);
            $cookie_control = 'remove';
        }
        Session::save();



        return response()
            ->json([
                'status'            => 'ok',
                'cookie_control'    => $cookie_control,
            ]);
    }
}
