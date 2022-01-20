<?php


namespace App\Helpers;


use App\Models\GiftSetBlock;
use App\Models\GiftSetBlockItems;
use App\Models\Products;

class GiftSet
{
    public static function get_db_fields() : array
    {
        $gift = \App\Models\GiftSet::all();
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
