<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Files;
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
//            'fields' => $this->get_db_fields(),
        ]);
    }

    public function update_catalog_item(){
        return "";
    }
}
