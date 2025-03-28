<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::orderBy('id','desc')->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product=new Product;
        $categories=Category::orderBy('name')->get();
        $providers=Provider::orderBy('name')->get();

        return view('products.form',compact('product','categories','providers'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

       /* $categories = Product::find($product->id);
        $categories= $categories->category;*/
        $categories=Category::orderBy('name')->get();
        $providers=Provider::orderBy('name')->get();

        return view('products.form',compact('product','categories','providers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product-> update($request->all());
        return to_route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index');
        //
    }
}
