<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(Request $request)
    {
        $items = Travel::with(['MultiImgs'])->get();
        return view('frontend.index',[
            'items' => $items
        ]);
    }
}
