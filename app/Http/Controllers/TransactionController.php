<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Asset;
use App\AssetDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\TransactionStatus;
use App\TransactionType;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth');
    }
    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Asset $asset)
    {
        $assets = Asset::all();

        return view('transactions.create', compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $transNo = 'RQ'.time();
        $new_trans = new Transaction;
        $new_trans->name = Auth::user()->name;
        $new_trans->user_id = Auth::user()->id;
        $new_trans->transNo = $transNo;
        $new_trans->total =0;
        $new_trans->save();

        $total = 0;
        foreach(Session::get('cart') as $asset_id => $quantity){
            
            $new_trans->assets()->attach($asset_id, ['quantity' => $quantity]);
            
            $total += $quantity;
        }

        $new_trans->total =$total;
        $new_trans->save();
        Session::forget('cart');
        return redirect('/transactions/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
            $data = request()->validate(
                ['details' => "required|array|distinct",
                'details.*' => "required|distinct"]
            );        
        //Transaction done during assignment of unit
        if(is_null($request->reject)){ 
            //update status of asset details (stock)
            foreach($request->details as $detail){           
                $assetDetail = AssetDetail::find($detail);
                $assetDetail->status_id = 2; //set asset status to deployed
                $assetDetail->user_id = $transaction->user_id; // set user id to requestor ID
                $assetDetail->save();
            }
            //update status of transaction (complete or reject)
            $transaction->status_id = 2; // set status to completed;

        }else{
            $transaction->status_id = 3; // set to Rejected
        }

        $transaction->save();
        return redirect('/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function reject($id)
    {
        dd($id);

        return redirect('/transactions');
    }

    public function returnTransaction(Request $request, Transaction $transaction)
    {
        
        $transNo = 'RN'.time();
        $new_trans = new Transaction;
        $new_trans->name = Auth::user()->name; //returnee's name
        $new_trans->user_id = Auth::user()->id; //returnee's ID
        $new_trans->type_id = 2; // Change  transaction type to Return
        $new_trans->transNo = $transNo;
        $new_trans->total =0;
        $new_trans->save();

        $total = 0;
        
        foreach(Session::get('returns') as $asset_detail_id => $quantity){
            $assetDetails = AssetDetail::where('id', $asset_detail_id)->get();
            foreach($assetDetails as $assetDetail){
                $asset_id = $assetDetail->asset_id;
                $new_trans->assets()->attach($asset_id, ['quantity' => $quantity, 'serial_number'=> $assetDetail->serial_number]);
            }            
            $total += $quantity;
        
        }

        $new_trans->total =$total;
        $new_trans->save();
        Session::forget('returns');
        return redirect('/myassets');
    }

    public function approveReturn(Request $request, Transaction $transaction)
    {
        if(is_null($request->reject)){ 
            
            $transaction = Transaction::find($request->transaction_id);
            foreach($transaction->assets as $asset){
                $assetDetail = AssetDetail::where('serial_number', $asset->pivot->serial_number)->first();
                $assetDetail->status_id = 1; //set asset status to available
                $assetDetail->user_id = null; // set user id to null
                $assetDetail->save();
            }
            $transaction->status_id = 2; // set status to completed;
        }else{
            $transaction->status_id = 3; // set to Rejected
        }

        $transaction->save();
        return redirect('/myassets');
    }

    public function filter($id)
    
    {

        $status = TransactionStatus::where('id',$id)->first();
        $transactions = $status->transactions;
        dd($transactions);
        return view('transactions.index', compact('transactions'));
    }

    public function type($id)
    {
        $type = TransactionType::query()->where('id',$id)->first();
        $transactions = $type->transactions;

        dd($transactions);
    }
}
