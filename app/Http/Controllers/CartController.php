<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Asset;
use App\AssetDetail;


class CartController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details_of_items_in_cart = [];
        $total = 0;
        if(!is_null(Session::get('cart')) || Session::exists('cart')){
            foreach(Session::get('cart') as $asset_id => $quantity){
                $asset = Asset::find($asset_id);
                if($asset !== null){
                    $asset->quantity = $quantity;
                    $total += $quantity;
                    array_push($details_of_items_in_cart, $asset);
                }
            }
        }

        return view('transactions.cart', compact('details_of_items_in_cart', 'total'));
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
        $cart = [];
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
        }
        $cart[$request->asset_id] = $request->quantity;
        $request->session()->put('cart', $cart);

        Session::flash('message', $request->quantity. " items added to cart");
        return redirect('/transactions/create');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Session::get('cart');
        $cart[$id] = $request->quantity;
        Session::put("cart", $cart);

        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
