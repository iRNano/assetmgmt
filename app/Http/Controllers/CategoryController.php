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
    public function __construct(){

        $this->middleware('auth');
    }
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
        return view('transactions.create', compact('assets'));
    }

    public function filterCategory($id)
    {
        $category = Category::find($id);
        $assets = $category->assets;
        return view ('assets.index', compact('assets'));
    }

}
