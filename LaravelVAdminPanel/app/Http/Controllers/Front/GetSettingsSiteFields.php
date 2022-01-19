<?php


namespace App\Http\Controllers\Front;

use App\Helpers\SettingsSiteFields;

class GetSettingsSiteFields extends AbstractGetBlock
{
    public static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields['siteSettings'] = SettingsSiteFields::getFields();
        return self::$fields;
    }
}
