<?php


namespace App\Http\Controllers\Front;


class GiftFields extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields['gift'] = \App\Helpers\GiftFields::get_db_fields();
        return self::$fields;
    }
}
