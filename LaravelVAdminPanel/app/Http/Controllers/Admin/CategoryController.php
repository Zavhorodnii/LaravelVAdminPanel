<?php

namespace App\Http\Controllers\Admin;

use App\Models\Files;
use App\Models\Сategory;
use Illuminate\Http\Request;

require_once 'Support_files/Get_fields_val.php';

class CategoryController extends Controller
{
    public function get_all(){
        $category = Сategory::select('id', 'title', 'сategories_id')->orderBy('id', 'ASC')->get();
        $set = [];

        $set = $this->create_catalog_view($category, $set);

        return view('admin/all-categories-page', [
            'blocks' => $set,
        ]);
    }

    public function create_catalog_view($catalog, $set, $prefix = '', $parent_id = null){
        foreach ($catalog as $item){
            if( $item->сategories_id == $parent_id ){
                $set[] = [
                    'id' => $item->id,
                    'title' =>$prefix . $item->title,
                ];
                $set = $this->create_catalog_view($catalog, $set, $prefix . '— ', $item->id);
            }
        }
        return $set;
    }

    public function create_page(){
        $category = Сategory::select('id', 'title', 'сategories_id')->orderBy('id', 'ASC')->get();
        $set = [];

        $set = $this->create_catalog_view($category, $set);
        return view('admin/create/create-category-item',[
            'files' => Files::orderBy('id', 'DESC')->get(),
            'all_categories' => $set,
        ]);
    }
    public function create(Request $request){

        $post_id = $request->input('post_id');
        if ($post_id) {
            $category = Сategory::find($post_id);
        } else
            $category = new Сategory;

//        var_export($request->input());
        $array_fields = get_fields_val($request);
//        var_export($array_fields);

        $category->title = $array_fields['title'];
        $category->slug = $array_fields['slug'];
        $category->сategories_id = $array_fields['сategory-id'];
        $category->save();

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update-category', $category->id),
            ]);

    }

    public function update($id){
        $category = Сategory::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['title'] = $category->title;
        $item_fields['slug'] = $category->slug;
        if(isset( $category->сategories_id ))
            $item_fields['сategories-id'] = Сategory::find($category->сategories_id);;

        $category = Сategory::select('id', 'title', 'сategories_id')->where('id', '!=', $id)->orderBy('id', 'ASC')->get();
        $set = [];

        $set = $this->create_catalog_view($category, $set);

        return view('admin/edit/edit-category-item', [
            'files'             => Files::orderBy('id', 'DESC')->get(),
            'fields'            => $item_fields,
            'all_categories'    => $set,
        ]);
    }

    public function delete(Request $request){
        $category_id = $request->input('post_id');
        $category = Сategory::find($category_id);
        Сategory::where('сategories_id', '=', $category_id)->update(['сategories_id' => $category->сategories_id]);

        Сategory::find($category_id)->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-categories'),
            ]);
    }
}
