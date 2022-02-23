<?php

namespace App\Http\Controllers\FrontControllers;

use App\Helpers\CreateMenuStruct;
use App\Helpers\GetCartProduct;
use App\Helpers\GetFrontPageBlocks;
use App\Helpers\GetProductInfo;
use App\Helpers\GetRelatedProductInfo;
use App\Helpers\PaymentFields;
use App\Http\Controllers\Admin\Controller;
use App\Http\Controllers\Front\GetSettingsSiteFields;
use App\Http\Controllers\Front\ImageControl;
use App\Models\Files;
use App\Models\Product_video;
use App\Models\Products;
use App\Models\SiteMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function get(Request $request,){
        $slug = 'cart/';
        $this->fields = GetFrontPageBlocks::get_page_blocks($slug);
        $site = SiteMenu::all();

//        dd($cart_info);

//        dd(\Cart::getContent());


        $all_gifts = \App\Helpers\GiftFields::get_db_fields();
        foreach ($all_gifts['repeater-price'] as &$gift){
            if( array_key_exists('repeater-product', $gift)) {
                if (is_array($gift['repeater-product'])) {
                    foreach ($gift['repeater-product'] as &$item) {
                        $product_item = Products::where('id', '=', $item['id'])->first();
                        $item = GetRelatedProductInfo::get_product_info($product_item->id);
                        $item['id'] = $product_item->id;
                    }
                }
            }
        }

//        $user_id = $_COOKIE['user_id'];
//        \Cart::session($user_id);
//
//        dd(\Cart::getContent()->toArray());

        return view('front/template/cartPage', [
            'siteSettings'  => GetSettingsSiteFields::getFields(null),
            'payment'       => PaymentFields::get_db_fields(),
            'siteMenu'      => CreateMenuStruct::create_menu_struct($site, []),
            'title'         => GetFrontPageBlocks::get_page_title($slug),
            'fields'        => $this->fields,
            'cart_info'     => GetCartProduct::getCartProduct(),
            'all_gifts'    => $all_gifts
        ]);
    }
}
