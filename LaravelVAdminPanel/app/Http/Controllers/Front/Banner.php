<?php


namespace App\Http\Controllers\Front;


class Banner extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        return self::$fields;
    }
}
