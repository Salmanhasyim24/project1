<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class DetailController extends Controller
{
   public function index(Request $request, $slug)
   {
     $item = Travel::with(['MultiImgs'])
        ->where('slug', $slug)
        ->firstOrFail();
        return view('frontend.detail',[
            'item' => $item
        ]);
   }
}
