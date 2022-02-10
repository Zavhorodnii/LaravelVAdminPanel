<?php

namespace App\Http\Controllers\FrontControllers;

use App\Helpers\CreateMenuStruct;
use App\Helpers\GetFrontPageBlocks;
use App\Helpers\GetProductInfo;
use App\Helpers\GetRelatedProductInfo;
use App\Helpers\PaymentFields;
use App\Http\Controllers\Admin\Controller;
use App\Http\Controllers\Front\GetSettingsSiteFields;
use App\Models\SiteMenu;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function get(Request $request, $slug){
        $this->fields = GetFrontPageBlocks::get_page_blocks($slug);
        $site = SiteMenu::all();

        $productInfo = GetProductInfo::get_product_info(null, $slug);
        foreach ( $productInfo['related-products'] as $product){
            $productInfo['related-product-info'][$product[0]->id] = GetRelatedProductInfo::get_product_info($product[0]->id);
        }
        $setProductInfo = null;
        foreach ( $productInfo['set-products'] as $product){
            $setProductInfo[$product[0]->id] = GetRelatedProductInfo::get_product_info($product[0]->id);
        }
        $productInfo['set-products'] = $setProductInfo;

//        dd($this->fields);
//        dd($productInfo);

        return view('front/template/productPage', [
            'siteSettings'  => GetSettingsSiteFields::getFields(null),
            'payment'       => PaymentFields::get_db_fields(),
            'siteMenu'      => CreateMenuStruct::create_menu_struct($site, []),
            'title'         => GetFrontPageBlocks::get_page_title($slug),
            'fields'        => $this->fields,
            'productInfo'   => $productInfo
        ]);
    }
}
