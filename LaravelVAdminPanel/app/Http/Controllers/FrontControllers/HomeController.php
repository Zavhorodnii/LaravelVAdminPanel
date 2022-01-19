<?php

namespace App\Http\Controllers\FrontControllers;

use App\Helpers\CreateMenuStruct;
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

        $mainPage = Page::where('slug', '=', null)->orderBy('id', 'ASC')->first();

        $blocks = PageBlock::where('pages_id', '=', $mainPage->id)->get();
        foreach ( $blocks as $block ){
            $this->fields[$block->type_block] = ( "App\Http\Controllers\Front\\". $block->type_block)::getFields($block->block_id);
        }

        $site = SiteMenu::all();

        return view('front/template/page', [
            'siteSettings'  => GetSettingsSiteFields::getFields(null),
            'payment'       => PaymentFields::get_db_fields(),
            'siteMenu'      => CreateMenuStruct::create_menu_struct($site, []),
            'title'         => $mainPage->title,
            'fields'        => $this->fields,
        ]);

    }
}
