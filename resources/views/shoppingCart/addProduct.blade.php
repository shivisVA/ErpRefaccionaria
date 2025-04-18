@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <!-- Invoice-->
    <div class="card invoice">
        <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                    <!-- Invoice branding-->
                    
                    <div class="h2 text-white mb-0">Productos</div>
                  
                </div>
                <div class="col-12 col-lg-auto text-center text-lg-right">
                    <!-- Invoice details-->
                    <div class="h3 text-white">{{ $purchase->provider->name }}</div>
                    #29301
                    <br />
                    January 1, 2020
                </div>
            </div>
        </div>
        <div class="card-body p-4 p-md-5">
            
            <form action="{{ route('PurchaseDetail.store', $purchase->id) }}" method="post">
                @csrf
                <!-- Invoice table-->
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th></th>
                                <th scope="col">Producto</th>
                                <th class="text-right" scope="col">Cantidad</th>
                                <th class="text-right" scope="col">Precio</th>
                                <th class="text-right" scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Invoice item 1-->

                            @foreach($products as $product)

                            <tr class="border-bottom">
                                <td>  
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="customCheck{{ $product->id }}" 
                                            type="checkbox" name="producto[{{ $product->id }}]" value="{{ $product->id }}" />
                                        <label class="custom-control-label" for="customCheck{{ $product->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="font-weight-bold">{{ $product->name }}</div>
                                    <div class="small text-muted d-none d-md-block">{{$product->description}}</div>
                                </td>
                                <td class="text-right font-weight-bold"><input class="form-control" id="cant" type="number" name="cantidades[{{  $product->id }}]" value="0"></td>
                                <td class="text-right font-weight-bold">{{ $product->cost }}</td>
                                <td class="text-right font-weight-bold">{{ $product->cant * $product->unit_price }}</td>
                            </tr>

                            @endforeach
                                   
                            
                            <!-- Invoice total-->
                            <tr>
                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total:</div></td>
                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700">{{ $purchase->total }}</div></td>
                            </tr>

                            </tr>
                        </tbody>
                    </table>
                </div>  
                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
            

        </div>
        <div class="card-footer p-4 p-lg-5 border-top-0">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <!-- Invoice - sent to info-->
                    <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                    <div class="h6 mb-1">Company Name</div>
                    <div class="small">1234 Company Dr.</div>
                    <div class="small">Yorktown, MA 39201</div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <!-- Invoice - sent from info-->
                    <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                    <div class="h6 mb-0">Start Bootstrap</div>
                    <div class="small">5678 Company Rd.</div>
                    <div class="small">Yorktown, MA 39201</div>
                </div>
                <div class="col-lg-6">
                    <!-- Invoice - additional notes-->
                    <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                    <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make checks or money orders out to Company Name, and include the invoice number in the memo. We appreciate your business, and hope to be working with you again very soon!</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection