<?php


namespace App\Http\Controllers\Front;


use App\Models\TextBlock;

class TextBlockFields extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        $catalog = TextBlock::find($post_id);
        self::$fields['title'] = $catalog->title;
        self::$fields['description'] = $catalog->description;
        return self::$fields;
    }
}
