<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\Catalog;
use App\Models\CatalogItems;
use App\Models\Files;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BlockCatalogController extends Controller
{
    public function get_all_catalog(){
        return view('admin/all-catalog-page',[
            'blocks' => Catalog::all(),
        ]);
    }

    public function create_catalog_item(){
        return view('admin/create/create-catalog-item', [
            'files' => Files::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function update_catalog_item($id){

        return view('admin/edit/edit-catalog-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'fields'    => \App\Helpers\Catalog::get_fields($id),
        ]);
    }

    public function create(Request $request){
        $post_id = $request->input('post_id');
        if ($post_id) {
            $catalog = Catalog::find($post_id);
            CatalogItems::where('catalog_id', '=', $post_id)->delete();
        } else
            $catalog = new Catalog;

        $array_fields = RequestInput::get_fields_val($request);

        $catalog->title = $array_fields['title'];
        $catalog->description = $array_fields['description'];
        $catalog->draft = $array_fields['draft'];
        $catalog->show_top = $array_fields['show-top'];
        $catalog->important_title = $array_fields['important']["title"];
        $catalog->important_link = $array_fields['important']["link"];
        $catalog->save();
        if( isset( $array_fields['repeater1'] ) && is_array( $array_fields['repeater1'] ) &&
            count( $array_fields['repeater1'] ) > 0) {
            foreach ($array_fields['repeater1'] as $value) {
                if (is_array($value))
                    $catalog_item = new CatalogItems;
                    $catalog_item->catalog_id = $catalog->id;
                    $catalog_item->title = $value['title'];
                    $img_path = Files::find($value['file-id']);
                    if(isset($img_path)) {
                        $catalog_item->file_id = $value['file-id'];
                    }
                    $catalog_item->page_link = $value['page-link'];
                    $catalog_item->top_title = $value['top']['title'];
                    $catalog_item->top_link = $value['top']['link'];
                    $catalog_item->save();
            }
        }

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update_catalog_item', $catalog->id),
            ]);
    }

    public function delete_item(Request $request){
        Catalog::find($request->input('post_id'))->delete();
        return response()
            ->json([
               'status' => 'ok',
               'url'    => route('all-catalog-page'),
            ]);
    }

    public function change_draft_catalog_item(Request $request){
        $catalog = Catalog::find($request->input('id'));
        $status = 'error';
        if($catalog){
            $catalog->draft = $request->input('status');
            $catalog->save();
            $status = 'ok';
        }
        return response()
            ->json([
                'status'    => $status,
            ]);
    }
}
