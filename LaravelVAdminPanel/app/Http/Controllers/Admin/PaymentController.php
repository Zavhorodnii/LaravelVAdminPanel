<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\PaymentFields;
use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function get_all(){
        return view('admin/payment-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => PaymentFields::get_db_fields(),
        ]);
    }

    function edit(Request $request){
        $array_fields = RequestInput::get_fields_val($request);
        Payment::query()->delete();

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
}
