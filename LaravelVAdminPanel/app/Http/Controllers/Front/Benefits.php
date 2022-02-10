<?php


namespace App\Http\Controllers\Front;


use App\Helpers\BenefitsFields;

class Benefits extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields = BenefitsFields::get_db_fields();
        return self::$fields;
    }
}
