<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultiImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = MultiImg::with(['travel'])->get();

        return view('backend.gallery.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel = Travel::all();

        return view('backend.gallery.create', [
            'travel' => $travel,
          
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/upload');
        }else{
            $path = 'public/noimage.jpg';
        }

        MultiImg::create([
            'travel_id' => $request->travel_id,
            'image' => $path
        ]);
        return to_route('image.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MultiImg::findOrFail($id);
        $travel = Travel::all();
        return view('backend.gallery.edit', [
            'travel' => $travel,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id;
          //mengupdate data
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'public/upload'
        );

        
        $item = MultiImg::findOrFail($id);
        //delete old image
         Storage::delete('public/upload/'.$item->image);

        $item->update($data);

        return redirect()->route('image.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

     $item = MultiImg::findOrFail($id);
        //delete old image
         Storage::delete('public/upload/'.$item->image);

        $item->delete();
 
        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }
}
