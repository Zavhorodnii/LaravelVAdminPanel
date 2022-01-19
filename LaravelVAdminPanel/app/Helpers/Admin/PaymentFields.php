<?php


namespace App\Helpers;


use App\Models\Files;
use App\Models\Payment;

class PaymentFields
{
    public static function get_db_fields(): array
    {
        $all_fields = Payment::orderBy('id', 'ASC')->get();
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items) {
            $img_path = Files::find($items->file_id);
            if (isset($img_path)) {
                $file = [
                    'status' => 'ok',
                    'id' => $items->file_id,
                    'url' => $img_path->file_path,
                ];
            } else {
                $file = [
                    'status' => 'error'
                ];
            }

            $fields['repeater-payment'][$index] = [
                'file-id' => $file,
            ];

            $index++;

        }
        return $fields;
    }
}
