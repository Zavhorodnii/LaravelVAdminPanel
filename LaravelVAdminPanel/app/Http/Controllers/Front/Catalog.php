<?php


namespace App\Http\Controllers\Front;


class Catalog extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields = \App\Helpers\Catalog::get_fields($post_id);

        return self::$fields;
    }
}
