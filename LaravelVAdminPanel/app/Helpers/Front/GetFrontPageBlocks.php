<?php

namespace App\Helpers;

use App\Models\Page;
use App\Models\PageBlock;

class GetFrontPageBlocks
{

    private static function get_page_by_slug( $slug )
    {
        $pages = [
            'product/',
            'cart/'
        ];

        foreach ( $pages as $page ){
            if( stripos( url()->current(), $page)){
                $slug = $page;
                break;
            }
        }
        return $slug;
    }


    public static function get_page_blocks( $slug ) : array
    {
        $slug = self::get_page_by_slug( $slug );

        $mainPage = Page::where('slug', '=', $slug)->orderBy('id', 'ASC')->first();
        $fields = array();
        $blocks = PageBlock::where('pages_id', '=', $mainPage->id)->get();
        foreach ( $blocks as $block ){
            $fields[$block->type_block][] = ( "App\Http\Controllers\Front\\". $block->type_block)::getFields($block->block_id);
        }

        return $fields;
    }
    public static function get_page_title( $slug ) : string
    {
        $slug = self::get_page_by_slug( $slug );

        $mainPage = Page::select('title')->where('slug', '=', $slug)->orderBy('id', 'ASC')->first();

        return $mainPage->title;
    }
}
