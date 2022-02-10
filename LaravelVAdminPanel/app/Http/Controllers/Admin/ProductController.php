<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FrontCatalogView;
use App\Helpers\GetProductInfo;
use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\Product_addition_info;
use App\Models\Product_addition_info_item;
use App\Models\Product_category;
use App\Models\Product_features;
use App\Models\Product_gallery;
use App\Models\Product_related_products;
use App\Models\Product_set;
use App\Models\Product_video;
use App\Models\Products;
use App\Models\Сategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Product_;

class ProductController extends Controller
{
    public function get_all(){
        return view('admin/all-product-page', [
            'blocks' => Products::select('id', 'title', 'draft', 'updated_at')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create_page(){
        $category = Сategory::select('id', 'title', 'сategories_id')->orderBy('id', 'ASC')->get();
        $set = [];

        $set = FrontCatalogView::create_catalog_view($category, $set);
        return view('admin/create/create-product-item',[
            'files' => Files::orderBy('id', 'DESC')->get(),
            'all_products' => Products::select('id', 'title')->where('draft', '=', false)->orderBy('id', 'DESC')->get(),
            'categories' => $set,
        ]);
    }

    public function create(Request $request){
        $post_id = $request->input('post_id');
        if ($post_id) {
            $product = Products::find($post_id);
            Product_video::where('products_id', '=', $post_id)->delete();
            Product_category::where('products_id', '=', $post_id)->delete();
            Product_set::where('products_id', '=', $post_id)->delete();
            Product_related_products::where('products_id', '=', $post_id)->delete();
            Product_gallery::where('products_id', '=', $post_id)->delete();
            Product_features::where('products_id', '=', $post_id)->delete();
            Product_addition_info::where('products_id', '=', $post_id)->delete();
        } else
            $product = new Products;

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);
//        var_export($array_fields);

        $product->draft = $array_fields['draft'];
        $product->title = $array_fields['title'];
        $product->slug = $array_fields['slug'];
        $product->sku = $array_fields['sku'];
        $product->price = $array_fields['price'];
        $product->regular_price = $array_fields['regular-price'];
        $product->weight = $array_fields['weight'];
        $product->length = $array_fields['length'];
        $product->width = $array_fields['width'];
        $product->height = $array_fields['height'];
        $product->dimensions = $array_fields['dimensions'] != null ? $array_fields['dimensions'] : '';
        $product->file_id = $array_fields['product-image'];
        $product->features_title = $array_fields['features-title'] != null ? $array_fields['features-title'] : '';
        $product->description_title = $array_fields['product-description-title'] != null ? $array_fields['product-description-title'] : '';
        $product->description = $array_fields['product-description'] != null ? $array_fields['product-description'] : '';
        $product->related_products_title = $array_fields['related-products-title'] != null ? $array_fields['related-products-title'] : '';
        $product->related_products_description = $array_fields['related-products-description'] != null ? $array_fields['related-products-description'] : '';
        $product->save();

        if( isset( $array_fields['repeater-video'] ) && is_array( $array_fields['repeater-video'] ) &&
            count( $array_fields['repeater-video'] ) > 0) {
            foreach ($array_fields['repeater-video'] as $value) {
                if (is_array($value)){
                    $product_video = new Product_video;
                    $product_video->products_id = $product->id;
                    $product_video->link = $value['video-link'];
                    $product_video->save();
                }
            }
        }

        if( isset( $array_fields['repeater-gallery'] ) && is_array( $array_fields['repeater-gallery'] ) &&
            count( $array_fields['repeater-gallery'] ) > 0) {
            foreach ($array_fields['repeater-gallery'] as $value) {
                if (is_array($value)) {
                    $product_gallery = new Product_gallery;
                    $product_gallery->products_id = $product->id;
                    $product_gallery->file_id = $value['gallery'];
                    $product_gallery->save();
                }
            }
        }

        if( isset( $array_fields['repeater-features'] ) && is_array( $array_fields['repeater-features'] ) &&
            count( $array_fields['repeater-features'] ) > 0) {
            foreach ($array_fields['repeater-features'] as $value) {
                if (is_array($value)) {
                    $product_features = new Product_features;
                    $product_features->products_id = $product->id;
                    $product_features->features = $value['product-feature-item'];
                    $product_features->save();
                }
            }
        }

        if( isset( $array_fields['related-products'] ) && is_array( $array_fields['related-products'] ) &&
            count( $array_fields['related-products'] ) > 0) {
            foreach ($array_fields['related-products'] as $value) {
                if (isset($value)) {
                    $related_products = new Product_related_products;
                    $related_products->products_id = $product->id;
                    $related_products->related_product_id = $value;
                    $related_products->save();
                }
            }
        }

        if( isset( $array_fields['set-products'] ) && is_array( $array_fields['set-products'] ) &&
            count( $array_fields['set-products'] ) > 0) {
            foreach ($array_fields['set-products'] as $value) {
                if (isset($value)) {
                    $set_products = new Product_set;
                    $set_products->products_id = $product->id;
                    $set_products->product_set = $value;
                    $set_products->save();
                }
            }
        }

        if( isset( $array_fields['category'] ) && is_array( $array_fields['category'] ) &&
            count( $array_fields['category'] ) > 0) {
            foreach ($array_fields['category'] as $value) {
                if (isset($value)) {
                    $product_category = new Product_category;
                    $product_category->products_id = $product->id;
                    $product_category->сategories_id = $value;
                    $product_category->save();
                }
            }
        }

        if( isset( $array_fields['repeater-addition'] ) && is_array( $array_fields['repeater-addition'] ) &&
            count( $array_fields['repeater-addition'] ) > 0) {
            foreach ($array_fields['repeater-addition'] as $value) {
                if (is_array($value)) {
                    $product_addition = new Product_addition_info;
                    $product_addition->products_id = $product->id;
                    $product_addition->title = $value['title-addition-info'];
                    $product_addition->save();

                    if( isset( $value['repeater-addition-item'] ) && is_array( $value['repeater-addition-item'] ) &&
                        count( $value['repeater-addition-item'] ) > 0) {
                        foreach ($value['repeater-addition-item'] as $item) {
                            if (is_array($item)) {
                                $product_addition_item = new Product_addition_info_item;
                                $product_addition_item->product_addition_infos_id = $product_addition->id;
                                $product_addition_item->title = $item['title-addition-info-item'];
                                $product_addition_item->value = $item['value-addition-info-item'];
                                $product_addition_item->save();
                            }
                        }
                    }
                }
            }
        }

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update_product', $product->id),
            ]);

    }

    public function update($id){

        $product = Products::find($id);
        $category = Сategory::select('id', 'title', 'сategories_id')->orderBy('id', 'ASC')->get();
        $set = [];

        $set = FrontCatalogView::create_catalog_view($category, $set);

//        dd($item_fields);

        return view('admin/edit/edit-product-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'all_products' => Products::select('id', 'title')
                ->where('draft', '=', false)
                ->where('id', '!=', $product->id)
                ->orderBy('id', 'DESC')->get(),
            'fields'    => GetProductInfo::get_product_info($id),
            'categories' => $set,
        ]);
    }

    public function change_draft(Request $request){
        $product = Products::find($request->input('id'));
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
        Products::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-product'),
            ]);
    }

}
