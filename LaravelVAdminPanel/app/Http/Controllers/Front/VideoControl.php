<?php


namespace App\Http\Controllers\Front;


class VideoControl
{
    public static function get_youtube_video_info( $link ) : array
    {
        parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
        if ( !isset($my_array_of_vars['v'])){
            $arr = explode('/', $link);
            $item['youtube_video_id'] = end($arr);
        }
        else
            $item['youtube_video_id'] = $my_array_of_vars['v'];
        $item['youtube_thumbnail'] = 'https://img.youtube.com/vi/' . $item['youtube_video_id'] . '/sddefault.jpg';
        return $item;
    }
}
