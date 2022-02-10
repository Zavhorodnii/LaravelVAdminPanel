<?php


namespace App\Http\Controllers\Front;


class HowWeWork extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields = \App\Helpers\HowWeWork::get_db_fields();

        return self::$fields;
    }
}
