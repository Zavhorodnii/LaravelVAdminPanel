<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Helpers\SettingsSiteFields;
use App\Models\Files;
use App\Models\SettingsSite;
use Illuminate\Http\Request;

class SettingsSiteController extends Controller
{
    function get_all(){
        return view('admin/settings-site-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => SettingsSiteFields::getFields(),
        ]);
    }

    function edit(Request $request){

        $array_fields = RequestInput::get_fields_val($request);
        SettingsSite::query()->delete();

        $items = new SettingsSite;
        $items->file_id = $array_fields['file-id'];
        $items->header_text = $array_fields['header-text'];
        $items->work_time = $array_fields['work-time'];
        $items->phone = $array_fields['phone'];
        $items->email = $array_fields['email'];
        $items->text_under_email = $array_fields['text-under-email'];
        $items->title_above_number = $array_fields['title-above-number'];
        $items->subtitle_above_number = $array_fields['subtitle-above-number'];
        $items->left_text_block = $array_fields['left-text-block'];
        $items->right_text_block = $array_fields['right-text-block'];
        $items->copyright = $array_fields['copyright'];
        $items->save();


        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }
}
