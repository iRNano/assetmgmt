<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetDetail;
use App\Asset;

class AssetDetailController extends Controller
{
	public function index(){

	}

    public function create(Request $request){
    	$assetID = $request->id;
    	return view('assetDetails.create', compact('assetID'));
    }

    public function show(){

    }

    public function update(){

    }

    public function destroy(){

    }

    public function store(Request $request){
    	$assetDetails = new AssetDetail();

    	$assetDetails->asset_id = $request->assetID;
    	$assetDetails->serial_number = $request->serial_number;
    	$assetDetails->os = $request->os;
    	$assetDetails->specs = $request->specs;
    	$assetDetails->purchase_date = $request->purchase_date;
    	$assetDetails->warranty_date = $request->warranty_date;
    	$assetDetails->save();

    	return redirect("assets/$request->assetID");
    }

    public function edit(){

    }
}
