<?php

namespace App\Http\Controllers\FrontControllers;

use App\Helpers\CreateMenuStruct;
use App\Helpers\GetFrontPageBlocks;
use App\Helpers\PaymentFields;
use App\Http\Controllers\Admin\Controller;
use App\Http\Controllers\Front\GetSettingsSiteFields;
use App\Models\Page;
use App\Models\PageBlock;
use App\Models\SiteMenu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected array $fields = array();
    public function get(){

        $front_page_slug = null;
        $this->fields = GetFrontPageBlocks::get_page_blocks($front_page_slug);

        $site = SiteMenu::all();

        return view('front/template/page', [
            'siteSettings'  => GetSettingsSiteFields::getFields(null),
            'payment'       => PaymentFields::get_db_fields(),
            'siteMenu'      => CreateMenuStruct::create_menu_struct($site, []),
            'title'         => GetFrontPageBlocks::get_page_title($front_page_slug),
            'fields'        => $this->fields,
        ]);

    }
}
