<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Provider;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases=Purchase::orderBy('id','desc')->get();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchase=new Purchase;
        $providers=Provider::orderBy('name','asc')->get();
        return view('purchases.form', compact('purchase','providers'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // $purchase=Purchase::create($request->all());
        $purchase=new Purchase($request->all());
        $purchase->total=0;
        $purchase->save();
        //return redirect()->back();
        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        $cart=$purchase->purchaseDetails;
        //dd($cart);
        return view('shoppingCart.index', compact('cart','purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
