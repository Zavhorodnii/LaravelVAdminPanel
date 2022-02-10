<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\GiftSet;
use App\Models\GiftSetBlock;
use App\Models\GiftSetBlockItems;
use App\Models\Products;
use Illuminate\Http\Request;

class GiftSetController extends Controller
{
    public function get_all(){
        return view('admin/gift-set-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => \App\Helpers\GiftSet::get_db_fields(),
            'all_products' => Products::select('id', 'title')->where('draft', '=', false)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create(Request $request){
        GiftSet::query()->delete();

        $array_fields = RequestInput::get_fields_val($request);
//        var_export($array_fields);
//        return

        $gift = new GiftSet;

        $gift->title = $array_fields['title'];
        $gift->subtitle = $array_fields['subtitle'];

        $gift->save();

        if( isset( $array_fields['repeater-set'] ) && is_array( $array_fields['repeater-set'] ) &&
            count( $array_fields['repeater-set'] ) > 0) {
            foreach ($array_fields['repeater-set'] as $value) {
                if (isset($value)) {
                    $gift_set_block = new GiftSetBlock;
                    $gift_set_block->gift_sets_id = $gift->id;
                    $gift_set_block->list_title = $value['title'];
                    $gift_set_block->products_id = $value['product-id'];
                    $gift_set_block->save();

                    if( isset( $value['repeater-list'] ) && is_array( $value['repeater-list'] ) &&
                        count( $value['repeater-list'] ) > 0) {
                        foreach ($value['repeater-list'] as $item) {
                            if (isset($item)) {
                                $gift_set_block_item = new GiftSetBlockItems;
                                $gift_set_block_item->gift_set_blocks_id = $gift_set_block->id;
                                $gift_set_block_item->item = $item['item'];
                                $gift_set_block_item->value = $item['value'];
                                $gift_set_block_item->save();
                            }
                        }
                    }
                }
            }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);

    }
}
