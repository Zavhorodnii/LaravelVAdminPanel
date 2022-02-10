<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\ReviewsTitle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BlockReviewsController extends Controller
{
    public function get_all_review(){
        return view('admin/review-title-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
//            'fields' => [],
            'fields' => $this->get_db_fields(),
        ]);
    }

    function update(Request $request){
        $array_fields = RequestInput::get_fields_val($request);

        ReviewsTitle::query()->delete();

//        var_export($array_fields);

//        foreach( $array_fields as $fields ){
            $guarantees = new ReviewsTitle;
            $guarantees->title = $array_fields['title'];
            $guarantees->subtitle = $array_fields['subtitle'];
            $guarantees->title_text = $array_fields['title-text'];
            $guarantees->title_video = $array_fields['title-video'];
            $guarantees->title_audio = $array_fields['title-audio'];
            $guarantees->save();
//        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }

    function get_db_fields(){
        $all_fields = ReviewsTitle::all();
//        var_export($all_fields);
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items){
            $fields = [
                'title' => $items->title,
                'subtitle' => $items->subtitle,
                'title-text' => $items->title_text,
                'title-video' => $items->title_video,
                'title-audio' => $items->title_audio,
            ];
            $index++;
        }
        return $fields;
    }
}
