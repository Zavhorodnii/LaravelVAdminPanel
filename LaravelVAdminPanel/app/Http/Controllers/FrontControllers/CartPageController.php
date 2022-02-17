<?php

namespace App\Http\Controllers\FrontControllers;

use App\Helpers\CreateMenuStruct;
use App\Helpers\GetFrontPageBlocks;
use App\Helpers\GetProductInfo;
use App\Helpers\GetRelatedProductInfo;
use App\Helpers\PaymentFields;
use App\Http\Controllers\Admin\Controller;
use App\Http\Controllers\Front\GetSettingsSiteFields;
use App\Http\Controllers\Front\ImageControl;
use App\Models\Products;
use App\Models\SiteMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function get(Request $request,){
//        $this->fields = GetFrontPageBlocks::get_page_blocks($slug);
        $site = SiteMenu::all();

        dd(\Cart::getContent());

        return view('front/template/productPage', [
            'siteSettings'  => GetSettingsSiteFields::getFields(null),
            'payment'       => PaymentFields::get_db_fields(),
            'siteMenu'      => CreateMenuStruct::create_menu_struct($site, []),
            'title'         => GetFrontPageBlocks::get_page_title($slug),
//            'fields'        => $this->fields,
//            'productInfo'   => $productInfo
        ]);
    }
}
