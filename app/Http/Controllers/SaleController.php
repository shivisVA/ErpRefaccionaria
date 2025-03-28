<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales=Sale::orderBy('id','desc')->get();
        return view('sales.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sale=new Sale;
        $clients=Client::orderBy('id','desc')->get();
        return view('sales.form',compact('sale','clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sale=new Sale($request->all());
        $sale->total=0;
        $sale->save();
        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
       
       return view('saleDetails.index', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
