<?php


namespace App\Http\Controllers\Front;


use App\Helpers\CreateMenuStruct;
use App\Models\SiteMenu;

class MenuList extends AbstractGetBlock
{
    public static array $fields = array();

    public static function getFields($post_id): array
    {
        $site = SiteMenu::all();
        self::$fields['menu'] = CreateMenuStruct::create_menu_struct($site, []);
        return self::$fields;
    }
}
