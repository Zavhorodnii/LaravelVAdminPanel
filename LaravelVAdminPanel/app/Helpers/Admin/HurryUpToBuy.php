<?php


namespace App\Helpers;


class HurryUpToBuy
{
    public static function get_db_fields(): array
    {
        $buy = \App\Models\HurryUpToBuy::first();
        $fields = array();

        $fields['title'] = $buy->title ?? '';
        $fields['gift-count'] = $buy->gift_count ?? '';
        $fields['button-title'] = $buy->button_title ?? '';

        return $fields;
    }
}
