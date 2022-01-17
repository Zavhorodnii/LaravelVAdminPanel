<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function get_all(){
        return view('admin/payment-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
//            'fields' => SocialLink::all(),
        ]);
    }

    function edit(Request $request){

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);

//        var_export($array_fields);

        Payment::query()->delete();

//        var_export($array_fields);


        if ( isset( $array_fields['repeater-payment']) && is_array( $array_fields['repeater-payment'] )) {
            foreach ($array_fields['repeater-payment'] as $fields) {
                $items = new Payment;
                $items->file_id = $fields['file-id'];
                $items->save();
            }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }

    function get_db_fields(){
        $all_fields = Payment::orderBy('id', 'ASC')->get();
//        var_export($all_fields);
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
//        var_export($fields);
        return $fields;
    }
}
