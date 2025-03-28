<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers=Provider::get();
        return view('providers.index',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provider=new Provider();
        return view('providers.form',compact('provider'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Provider::create($request->all());
        return to_route('providers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {

        return view('providers.form',compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->update($request->all());
        return to_route('providers.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return to_route('providers.index');
        //
    }
}
