<?php


namespace App\Helpers;


class FrontCatalogView
{

    public static function create_catalog_view($catalog, $set, $prefix = '', $parent_id = null){
        foreach ($catalog as $item){
            if( $item->сategories_id == $parent_id ){
                $set[] = [
                    'id' => $item->id,
                    'title' =>$prefix . $item->title,
                ];
                $set = self::create_catalog_view($catalog, $set, $prefix . '— ', $item->id);
            }
        }
        return $set;
    }
}
