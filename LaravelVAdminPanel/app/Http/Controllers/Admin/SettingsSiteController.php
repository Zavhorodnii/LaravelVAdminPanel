<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\SettingsSite;
use Illuminate\Http\Request;

class SettingsSiteController extends Controller
{
    function get_all(){
        return view('admin/settings-site-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
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

    function get_db_fields(){
        $all_fields = SettingsSite::orderBy('id', 'ASC')->get();
//        var_export($all_fields);
        $fields = array();
        if (!empty($all_fields)) {
            $img_path = Files::find($all_fields[0]->file_id);
            if (isset($img_path)) {
                $file = [
                    'status' => 'ok',
                    'id' => $all_fields[0]->file_id,
                    'url' => $img_path->file_path,
                ];
            } else {
                $file = [
                    'status' => 'error'
                ];
            }

            $fields['file-id'] = $file;
            $fields['header-text'] = $all_fields[0]->header_text;
            $fields['work-time'] = $all_fields[0]->work_time;
            $fields['phone'] = $all_fields[0]->phone;
            $fields['email'] = $all_fields[0]->email;
            $fields['text-under-email'] = $all_fields[0]->text_under_email;
            $fields['title-above-number'] = $all_fields[0]->title_above_number;
            $fields['subtitle-above-number'] = $all_fields[0]->subtitle_above_number;
            $fields['left-text-block'] = $all_fields[0]->left_text_block;
            $fields['title-above-number'] = $all_fields[0]->title_above_number;
            $fields['left-text-block'] = $all_fields[0]->left_text_block;
            $fields['right-text-block'] = $all_fields[0]->right_text_block;
            $fields['copyright'] = $all_fields[0]->copyright;
        }
//        dd($fields);
//        var_export($fields);
        return empty($fields) ? null : $fields;
    }
}
