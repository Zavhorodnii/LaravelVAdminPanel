<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class BlockStockKitsController extends Controller
{
    public function get_all_stock_kits(){
        return view('admin/all-stock-kits-page');
    }
}
