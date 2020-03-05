<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetDetail;
use Illuminate\Http\Request;
use DB;
use App\Transaction;
use Auth;


class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth');
    }
    public function index(Request $request, Asset $assets)
    {   
        //Show all active assets
        $assets = Asset::where('isActive', true)->get();
        
        // $stockCalculator = DB::table('asset_details')->where([
        //     ['asset_id', '=',$asset->id], 
        //     ['status_id','=', 1]])->count();

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
        $assetDetail = new AssetDetail();
        // $asset->name = $request->name;
        $asset->category_id = $request->category;
        $asset->brand = $request->brand;
        $asset->model = $request->model;
        
        //asset details
        $asset->save();

        // // $assetDetail->asset_id = $asset->id;
        // // $assetDetail->specs = $request->specs;
        // // $assetDetail->os = $request->os;
        // // $assetDetail->serial_number = $request->serial_number;
        // // $assetDetail->purchase_date = $request->purchase_date;
        // // $assetDetail->warranty_date = $request->warranty_date;
        // // if($request->category = 7){
        // //     $assetDetail->no_of_users = $request->no_of_users;
        // //     $assetDetail->license = $request->license;
        // //     $assetDetail->platform = $request->platform;
        // // }

        // $assetDetail->save();

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
        $assetDetails = AssetDetail::where('asset_id', $asset->id)->get();
        return view('assets.show', compact('asset', 'assetDetails'));
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
    public function destroy($id)
    {
        $assetDetail = AssetDetail::find($id);
        if($assetDetail->status_id == 1){
            $assetDetail->status_id == 3; //Set to 'Scrapped'
        }else{
            //cannot be deleted 
        }
        
        return redirect('/assets/1');
    }

    public function myassets()
    {
        // $assets = Asset::all();

        // load('transactions.assets');
        $transactions = Transaction::has('user', '=', auth()->user()->id)->get();
        // foreach($transactions as $transaction){
        //     foreach($transaction->assets as $asset){
        //         dd($asset->details);
        //     }
        // }
        
        

        return view('assets.myassets', compact('transactions'));
    }

    public function search(Request $request)
    {
        $assets = Asset::query()
            ->where('brand', 'LIKE', "%$request->search%")
            ->orWhere('model', 'LIKE',"%$request->search%")
            ->get();

        return view('assets.index', compact('assets'));
    }
}
