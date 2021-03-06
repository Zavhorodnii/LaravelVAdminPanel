<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BestsellerFields;
use App\Helpers\RequestInput;
use App\Models\Bestseller;
use App\Models\Bestseller_product;
use App\Models\Files;
use App\Models\Products;
use Illuminate\Http\Request;

//use function App\Http\Controllers\Admin\Support_files\get_fields_val;

class BestsellerController extends Controller
{
    public function get_all(){
        return view('admin/all-bestseller-page', [
            'blocks' => Bestseller::select('id', 'title', 'draft', 'updated_at')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create_page(){
        return view('admin/create/create-bestseller-item',[
            'files' => Files::orderBy('id', 'DESC')->get(),
            'all_products' => Products::select('id', 'title')->where('draft', '=', false)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create(Request $request){
        $post_id = $request->input('post_id');
        if ($post_id) {
            $bestseller = Bestseller::find($post_id);
            Bestseller_product::where('bestsellers_id', '=', $post_id)->delete();
        } else
            $bestseller = new Bestseller;

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);
//        var_export($array_fields);

        $bestseller->draft = $array_fields['draft'];
        $bestseller->title = $array_fields['title'];
        $bestseller->all_text_title = $array_fields['all-text-title'];
        $bestseller->all_text_link = $array_fields['all-text-link'];
        $bestseller->slider_block = $array_fields['slider-block'];

        $bestseller->save();

        if( isset( $array_fields['related-products'] ) && is_array( $array_fields['related-products'] ) &&
            count( $array_fields['related-products'] ) > 0) {
            foreach ($array_fields['related-products'] as $value) {
                if (isset($value)) {
                    $bestseller_product = new Bestseller_product;
                    $bestseller_product->bestsellers_id = $bestseller->id;
                    $bestseller_product->products_id = $value;
                    $bestseller_product->save();
                }
            }
        }

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update-bestseller', $bestseller->id),
            ]);

    }

    public function update($id){

        return view('admin/edit/edit-bestseller-item', [
            'files'             => Files::orderBy('id', 'DESC')->get(),
            'all_products'      => Products::select('id', 'title')
                ->where('draft', '=', false)
                ->orderBy('id', 'DESC')->get(),
            'fields'            => BestsellerFields::get_fields($id),
        ]);
    }

    public function change_draft(Request $request){
        $product = Bestseller::find($request->input('id'));
        $status = 'error';
        if($product){
            $product->draft = $request->input('status');
            $product->save();
            $status = 'ok';
        }
        return response()
            ->json([
                'status'    => $status,
            ]);
    }

    public function delete(Request $request){
        Bestseller::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-bestseller'),
            ]);
    }

}
