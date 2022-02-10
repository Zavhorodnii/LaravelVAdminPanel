<?php


namespace App\Http\Controllers\Front;


use App\Models\AudioReview;
use App\Models\ReviewsTitle;
use App\Models\TextReview;
use App\Models\VideoReview;

class Review extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        $objects = ReviewsTitle::first();
        self::$fields['title'] = [
            'title'         => $objects->title,
            'subtitle'      => $objects->subtitle,
            'title_text'    => $objects->title_text,
            'title_video'   => $objects->title_video,
            'title_audio'   => $objects->title_audio,
        ];

        $objects = TextReview::where('draft', '=', false)->get();
        foreach ($objects as $object){
            self::$fields['text_reviews'][] = [
                'name'          => $object->person_name,
                'description'   => $object->description,
                'file'          => ImageControl::get_image_url($object->file_id)
            ];
        }

        $objects = VideoReview::where('draft', '=', false)->get();
        foreach ($objects as $object){
            self::$fields['video_review'][] = [
                'name'      => $object->person_name,
                'review'    => $object->review,
                'video'     => VideoControl::get_youtube_video_info($object->video_url),
            ];
        }

        $objects = AudioReview::where('draft', '=', false)->get();
        foreach ($objects as $object){
            self::$fields['audio_review'][] = [
                'name'      => $object->person_name,
                'review'    => $object->review,
                'city'      => $object->city,
                'file'      => ImageControl::get_image_url($object->file_id),
                'date'      => $object->created_at,
            ];
        }

        return self::$fields;
    }
}
