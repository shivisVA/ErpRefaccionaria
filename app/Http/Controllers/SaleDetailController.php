<?php

namespace App\Http\Controllers;

use App\Models\SaleDetail;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Sale $sale)
    {
        
        return view('saleDetails.index', compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Sale $sale)
    {
        $products= Product::orderBy('name','desc')->get();

        return view('saleDetails.addProduct', compact('products','sale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Sale $sale)
    {
        $total=$sale->total;

        foreach ($request->producto as $indice=>$producto) {

            $registrado=$sale->saleDetails()->where('product_id',$producto)->first();
            $product=Product::find($producto);
            $stock=$product->stock;
            $price=$product->price;
            $cantidad=$request->cantidades[$indice];

             if($registrado){
                
                $cant=$registrado->cant;
                $total=$total-($price*$cant);
                $stock=$stock+$cant;

                $subtotal=$cantidad*$price;
                $total=$total+$subtotal;
                
                $registrado->cant=$cantidad;
                $registrado->save();

            }
            else
            {
                $subtotal=$cantidad*$price;
                $total=$total+$subtotal;

                $sale->saleDetails()->create(['product_id'=>$producto,
                    'cant'=>$cantidad,
                    'unit_price'=>$price,
                ]);
            } 

            $stock=$stock-$cantidad;
            $product->stock=$stock;
            $product->save();

        }
        
        $sale->total=$total;
        $sale->save();
        return redirect()->route('saleDetails.index',$sale);
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleDetail $saleDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleDetail $saleDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaleDetail $saleDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleDetail $saleDetail)
    {
        $total=$saleDetail->sale->total;
        $total=$total-(($saleDetail->unit_price)*($saleDetail->cant));
        $saleDetail->sale->total=$total;
        $saleDetail->sale->save();

        $stock=($saleDetail->product->stock)+($saleDetail->cant);
        
        $saleDetail->product->stock=$stock;
        $saleDetail->product->save();

        $saleDetail->delete();
        return redirect()->back();
    }
}
