<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use App\Http\Controllers\Product_;

class ProductController extends Controller
{
    public function all_products(){
        return view('admin/all_products');
    }

    public function create_product(){
        return view('admin/create/create-product', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => array(),
        ]);
    }

    public function create_product_item(Request $request){
        $product = new Product_;

    }
}
