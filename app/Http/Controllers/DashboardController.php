<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\AssetDetail;
use App\Transaction;
use App\User;

class DashboardController extends Controller
{
    public function index(){
        $assets = Asset::all();        
        $assetDetails = AssetDetail::all();
        $availAssets = AssetDetail::where('status_id', 1)->get();
        $deployedAssets = AssetDetail::where('status_id', 2)->get();
        $scrappedAssets = AssetDetail::where('status_id', 3)->get();
        $soldAssets = AssetDetail::where('status_id', 4)->get();

        $transactions = Transaction::all();
        $pending = Transaction::where('status_id', 1)->get();
        $completed = Transaction::where('status_id', 2)->get();
        $rejected = Transaction::where('status_id', 3)->get();
        $users = User::all();

        return view('dashboard.index', compact('assets', 'assetDetails', 'availAssets','deployedAssets','deployedAssets','scrappedAssets','soldAssets','transactions', 'pending', 'completed', 'rejected','users'));
    }
}
