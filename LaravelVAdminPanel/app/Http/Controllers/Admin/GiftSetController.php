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
            'fields' => $this->get_db_fields(),
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

    function get_db_fields(){
        $gift = GiftSet::all();
        $fields = array();
        if ( isset($gift) ) {
            $index = 1;
            foreach ($gift as $item) {
                $fields['title'] = $item->title;
                $fields['subtitle'] = $item->subtitle;
                $all_fields_gift_block = GiftSetBlock::where('gift_sets_id', '=', $item->id)->get();
                if (isset($all_fields_gift_block)) {
                    foreach ($all_fields_gift_block as $block) {
                        $product = Products::where('id', '=', $block->products_id)->get();
                        $fields['repeater-set'][$index] = [
                            'list-title' => $block->list_title,
                            'product-title' => $product[0]->title,
                            'product-id' => $product[0]->id,
                        ];
                        $all_gift_block_item = GiftSetBlockItems::where('gift_set_blocks_id', '=', $block->id)->get();
                        $index2 = 1;
                        if (isset($all_gift_block_item)) {
                            foreach ($all_gift_block_item as $gift_block_item) {
                                $fields['repeater-set'][$index]['repeater-list'][$index2] = [
                                    'item' => $gift_block_item->item,
                                    'value' => $gift_block_item->value,
                                ];
                                $index2++;
                            }
                        }
                        $index++;
                    }
                }
                $index++;
            }
        }
        return $fields;
    }
}
