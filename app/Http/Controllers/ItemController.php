<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('item.index',['items'=> Item::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$locale="en")
    {
        //
        $validatedData = $request->validate([
            'item_name' => 'required|max:50',
            'item_desc' => 'required|max:500',
            'price' => 'required|numeric',
            'image_link' => 'required'
        ]);
        if ($request->file('image_link')) {
            $validatedData['image_link'] = $request->file('image_link')->store('item-images');
        }
        Item::create($validatedData);
        return redirect(App::getLocale() .'/item')->with('success', 'An Item has been added');
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
    public function edit($locale = "en",$id)
    {
        //

        return view('item.edit', [
            'item' => Item::get()->where('item_id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$locale = "en", $id)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|max:50',
            'item_desc' => 'required|max:500',
            'price' => 'required|numeric',
            'image_link' => 'image|file|max:5000',
        ]);
        if ($request->file('image_link')) {
            $validatedData['image_link'] = $request->file('image_link')->store('item-images');
        }

        Item::where('item_id',$id)->update($validatedData);
        return redirect(App::getLocale() .'/item')->with('success','An Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale='en',$id)
    {
        //
        Item::destroy('item_id', $id);
        return redirect(App::getLocale() .'/item')->with('success', 'An Item has been deleted');
    }
}
