<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\Bestseller;
use App\Models\Catalog;
use App\Models\Files;
use App\Models\Page;
use App\Models\PageBlock;
use App\Models\TextBlock;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function get_all(){
        return view('admin/all-pages-page', [
            'blocks' => Page::select('id', 'title', 'updated_at')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create_page(){
        $set= $this->all_block();

        return view('admin/create/create-page-item',[
            'files' => Files::orderBy('id', 'DESC')->get(),
            'categories' => $set,
        ]);
    }

    public function create(Request $request){
        $post_id = $request->input('post_id');
        if ($post_id) {
            $page = Page::find($post_id);
            PageBlock::where('pages_id', '=', $post_id)->delete();
        } else
            $page = new Page;

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);
//        var_export($array_fields);

        $page->title = $array_fields['title'];
        $page->slug = $array_fields['slug'];
        $page->save();

        if( isset( $array_fields['block'] ) && is_array( $array_fields['block'] ) &&
            count( $array_fields['block'] ) > 0) {
            foreach ($array_fields['block'] as $value) {
                    $page_block = new PageBlock;
                    $block = explode('|', $value);
                    $page_block->pages_id = $page->id;
                    $page_block->type_block = $block[0];
                    $page_block->block_id = $block[1] != '' ? $block[1] : null;
//                    $page_block->link = $value['video-link'];
                    $page_block->save();
                }
        }

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update-page', $page->id),
            ]);

    }

    public function update($id){
        $page = Page::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['title'] = $page->title;
        $item_fields['slug'] = $page->slug;

        $page_block = PageBlock::where('pages_id', '=', $id)->get();;
        $index = 1;
        if( isset($page_block) ){
            foreach ( $page_block as $item ){
                $item_fields['block'][$index] = [
                    'id' => $item->type_block . '|' . $item->block_id,
                ];
                $index++;
            }
        }


        $set = $this->all_block();

        return view('admin/edit/edit-page-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'fields'    => $item_fields,
            'categories' => $set,
        ]);
    }

    public function delete(Request $request){
        Page::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-pages-page'),
            ]);
    }

    private function all_block(): array{
        $set[] = [
            'title' => 'Выгоды',
            'id'  => 'Benefits|',
        ];
        $set[] = [
            'title' => 'Подарки',
            'id'  => 'Gift|',
        ];
        $set[] = [
            'title' => 'Гарантии',
            'id'  => 'Guarantees|',
        ];
        $set[] = [
            'title' => 'Отзывы',
            'id'  => 'Review|',
        ];
        $set[] = [
            'title' => 'Как мы работаем',
            'id'  => 'HowWeWork|',
        ];
        $set[] = [
            'title' => 'Доставка',
            'id'  => 'Delivery|',
        ];
        $set[] = [
            'title' => 'Галерея',
            'id'  => 'Gallery|',
        ];
        $set[] = [
            'title' => 'Подарки Акций',
            'id'  => 'GiftSet|',
        ];
        $set[] = [
            'title' => 'Банер',
            'id'  => 'Banner|',
        ];

        $items = TextBlock::select('id', 'title')->where('draft', '=', false)->get();
        foreach ($items as $item ){
            $set[] = [
                'title'     => 'Текстовый блок: ' . $item->title,
                'id'      => 'TextBlockFields|' . $item->id,
            ];
        }
        $items = Catalog::select('id', 'title')->where('draft', '=', false)->get();
        foreach ($items as $item ){
            $set[] = [
                'title'     => 'Каталог: ' . $item->title,
                'id'      => 'Catalog|' . $item->id,
            ];
        }
        $items = Bestseller::select('id', 'title')->where('draft', '=', false)->get();
        foreach ($items as $item ){
            $set[] = [
                'title'     => 'Хиты продаж: ' . $item->title,
                'id'      => 'Bestseller|' . $item->id,
            ];
        }



        return $set;
    }
}
