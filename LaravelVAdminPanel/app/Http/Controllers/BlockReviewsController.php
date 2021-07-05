<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockReviewsController extends Controller
{
    public function get_all_review(){
        return view('amin/all-review-page');
    }
}
