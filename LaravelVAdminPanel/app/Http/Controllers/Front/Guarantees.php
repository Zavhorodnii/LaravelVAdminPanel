<?php


namespace App\Http\Controllers\Front;


class Guarantees extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields = \App\Helpers\Guarantees::get_db_fields();

        return self::$fields;
    }
}
