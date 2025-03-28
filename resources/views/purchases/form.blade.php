@extends('layouts.app')

@section('content')
<div class="container mt-n10">
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Nueva Compra</div>
                  
                    <div class="card-body">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                @if($purchase->id==null) 
                                    <form action="{{ route('purchases.store') }}" method="post">
                                @else
                                    <form action="" method="post">
                                    @method('put')
                                @endif

                                    @csrf
                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Proveedor</label>
                                        <select class="form-control" name="provider_id" id="exampleFormControlSelect1">
                                            @foreach($providers as $provider )
                                               <option {{ $provider->id==$purchase->provider_id? 'selected':'' }} value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group"><label for="exampleFormControlTextarea1">Fecha</label><input type="date" name="date" >
                                    </div>

                                    <button class="btn btn-primary" type="submmit">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection