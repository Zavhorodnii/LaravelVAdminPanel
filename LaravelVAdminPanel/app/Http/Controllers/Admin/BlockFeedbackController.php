<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class BlockFeedbackController extends Controller
{
    public function get_all_feedback(){
        return view('admin/all-feedback-page');
    }
}
