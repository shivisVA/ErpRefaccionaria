@extends('layouts.app')

@section('content')
<div class="container mt-n10">
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Nueva Venta</div>
                  
                    <div class="card-body">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                @if($sale->id==null) 
                                    <form action="{{ route('sales.store') }}" method="post">
                                @else
                                    <form action="" method="post">
                                    @method('put')
                                @endif

                                    @csrf
                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Cliente</label>
                                        <select class="form-control" name="client_id" id="exampleFormControlSelect1">
                                            @foreach($clients as $client )
                                               <option {{ $client->id==$sale->client_id? 'selected':'' }} value="{{ $client->id }}">{{ $client->name }}</option>
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