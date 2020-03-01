<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //Show all active assets
        $assets = Asset::where('isActive', true)->get();
        return view('assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $asset = new Asset();
        $asset->name = $request->name;
        $asset->category_id = $request->category;
        $asset->brand = $request->brand;
        $asset->os = $request->os;
        $asset->specs = $request->specs;
        $asset->model = $request->model;
        $asset->serial_number = $request->serial_number;
        $asset->purchase_date = $request->purchase_date;
        $asset->warranty_date = $request->warranty_date;
        if($request->category = 7){
            $asset->no_of_users = $request->no_of_users;
            $asset->license = $request->license;
            $asset->platform = $request->platform;
        }

        $asset->save();

        return redirect('/assets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {   

        return view('assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {

        $asset->name = $request->name;
        $asset->category_id = $request->category;
        $asset->brand = $request->brand;
        $asset->os = $request->os;
        $asset->specs = $request->specs;
        $asset->model = $request->model;
        $asset->serial_number = $request->serial_number;
        $asset->purchase_date = $request->purchase_date;
        $asset->warranty_date = $request->warranty_date;
        if($request->category = 7){
            $asset->no_of_users = $request->no_of_users;
            $asset->license = $request->license;
            $asset->platform = $request->platform;
        }

        $asset->save();

        return redirect('/assets/'.$asset->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $asset->isActive = 0;
        $asset->save();
        
        return redirect('/assets');
    }
}
