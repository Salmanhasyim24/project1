<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTravelRequest;
use App\Http\Requests\Admin\UpdateTravelRequest;
use App\Models\Travel;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Travel::all();
        return view('backend.travel.index',[
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
        return view('backend.travel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTravelRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
    
        Travel::create($data);

           $notification = array(
            'message' => 'Travel Package Inserted Successfully',
            'alert-type' => 'success'
        );
        return to_route('travel.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Travel::findOrFail($id);

        return view('backend.travel.edit',[
            'item' => $item
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    //mengupdate data
    $data = $request->all();
    $data['slug'] = Str::slug($request->title);

  $id = $request->id;
        $item = Travel::findOrFail($id);

    $item->update($data);

    $notification = array(
       'message' => 'Travel Package Updated Successfully',
       'alert-type' => 'success'
        );
    return to_route('travel.index')->with($notification);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Travel::findOrFail($id)->delete();

         $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }
}
