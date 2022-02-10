<?php


namespace App\Http\Controllers\Front;


use App\Helpers\GetGalleryField;

class Gallery extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        $fields = GetGalleryField::get_db_fields();
        self::$fields['title'] = $fields['title'];
        self::$fields['description'] = $fields['description'];

        $index = 0;
        foreach ($fields as $field){
            if( is_array( $field ) ){
                self::$fields['images'][] = $field;

                $index++;
            }
        }
        self::$fields['image_count'] = $index;
        self::$fields['while_count'] = ceil($index / 4);

//        dd(self::$fields);

        return self::$fields;
    }
}
