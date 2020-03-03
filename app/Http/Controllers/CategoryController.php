<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Assets;
use App\AssetDetail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Category;
        $type->name = $request->name;
        $type->save();

        return redirect('/assets/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
        $assets = $category->assets;
        
        // if(!is_null($assets)){
        //     foreach($assets as $asset){
        //     $countArray = Arr::add([ 'asset_id' => 'count'], $asset->id, (DB::table('asset_details')
        //         ->where('asset_id', $asset->id)->count()));
        //     }
        // }else{
        //     $countArray = [];    
        // }

        // dd($countArray);
        
        
        
        // $arrayCount = ["asset_id", 'count'];
        // $assetCount = DB::table('asset_details')->where('asset_id', $assets[0]->id)->count();
        // dd($assetCount);
        // $assetCount = [];
        // for ($i=0; $i < count($assets); $i++) { 
        //     $assetCount = Arr::push(DB::table('asset_details')->where('asset_id', $assets->id));
        // }
        // dd($assetCount);
        
        // $count = DB::table('asset_details')->where('status_id', 1);
        return view('transactions.create', compact('assets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
