<?php


namespace App\Helpers;


use App\Models\Files;
use App\Models\SettingsSite;

class SettingsSiteFields
{
    public static function getFields(): ?array
    {
        $all_fields = SettingsSite::orderBy('id', 'ASC')->get();
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
        return empty($fields) ? null : $fields;
    }
}
