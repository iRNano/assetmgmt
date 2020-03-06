<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetDetail;
use App\Asset;

class AssetDetailController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
	public function index(){

	}

    public function create(Request $request){
        $asset = Asset::where('id', $request->id)->first();
        $category_id = $asset->category->id;
        $assetID = $asset->id;
    	// $assetID = $request->id;
    	return view('assetDetails.create', compact('assetID', 'category_id'));
    }

    public function show(){

    }

    public function update(){

    }

    public function destroy($id){
        return redirect('assets/$id');
    }

    public function store(Request $request){

        $data = request()->validate(
            ['serial_number' => "required|distinct"]);
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

    public function edit($id){

        $assetDetails = AssetDetail::find($id);
        

        return view('assetDetails.edit', compact('assetDetails'));
    }  
}
