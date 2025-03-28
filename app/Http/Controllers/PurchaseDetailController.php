<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetail;
use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Purchase $purchase)
    {
        $products= Product::where('provider_id',$purchase->provider_id)->get();

        return view('shoppingCart.addProduct', compact('products','purchase'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Purchase $purchase)
    {
        $total=$purchase->total;
        foreach ($request->producto as $indice=>$producto) {

            $registrado=$purchase->purchaseDetails()->where('product_id',$producto)->first();
            $product=Product::find($producto);
            $stock=$product->stock;
            $cost=$product->cost;
            $cantidad=$request->cantidades[$indice];
            
            if($registrado){
                $cant=$registrado->cant;
                $total=$total-($cost*$cant);
                $stock=$stock-$cant;

                $subtotal=$cantidad*$cost;
                $total=$total+$subtotal;
                

                $registrado->cant=$cantidad;
                $registrado->save();

            }
            else
            {

                $subtotal=$cantidad*$cost;
                $total=$total+$subtotal;

            
                $purchase->purchaseDetails()->create(['product_id'=>$producto,
                    'cant'=>$cantidad,
                    'unit_price'=>$cost,
            ]);
            } 

            $stock=$stock+$cantidad;
            $product->stock=$stock;
            $product->save();
  
        }

        $purchase->total=$total;
        $purchase->save();
        return redirect()->route('purchases.show',$purchase);
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseDetail $purchaseDetail)
    {
        $total=$purchaseDetail->purchase->total;
        $total=$total-(($purchaseDetail->unit_price)*($purchaseDetail->cant));
        $purchaseDetail->purchase->total=$total;
        $purchaseDetail->purchase->save();

        
        $stock=($purchaseDetail->product->stock)-($purchaseDetail->cant);
        
        $purchaseDetail->product->stock=$stock;
        
        $purchaseDetail->product->save();

        $purchaseDetail->delete();
        return redirect()->back();
        //
    }
}
