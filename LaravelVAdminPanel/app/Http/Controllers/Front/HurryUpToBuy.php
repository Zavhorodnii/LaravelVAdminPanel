<?php


namespace App\Http\Controllers\Front;


use Illuminate\Support\Facades\App;

class HurryUpToBuy extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields = \App\Helpers\HurryUpToBuy::get_db_fields();

        self::$fields['date'] = strtolower(date('j F'));

        return self::$fields;
    }
}
