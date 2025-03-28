@extends('layouts.app')

@section('content')
<div class="container mt-n10">
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Nuevo Producto</div>
                  
                    <div class="card-body">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                @if($product->id==null) 
                                    <form action="{{ route('products.store') }}" method="post">
                                @else
                                    <form action="{{ route('products.update',$product->id) }}" method="post">           
                                    @method('put')
                                @endif

                                    @csrf
                                     <div class="form-group">

                                        <label for="exampleFormControlInput1">Nombre</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="name" value="{{ $product->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Descripcion</label><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $product->description }}</textarea>
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Precio de Venta</label><input class="form-control" id="exampleFormControlInput1" type="number" placeholder="" name="price" value="{{ $product->price }}">
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Costo de Compra</label><input class="form-control" id="exampleFormControlInput1" type="number" placeholder="" name="cost" value="{{ $product->cost }}">
                                    </div>

                                       <div class="form-group">
                                            <label for="exampleFormControlSelect1">Categoria</label>
                                            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                                @foreach($categories as $category )
                                                   <option {{ $category->id==$product->category_id? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Proveedor</label>
                                            <select class="form-control" name="provider_id"id="exampleFormControlSelect1">
                                                @foreach($providers as $provider )
                                                   <option {{ $provider->id==$product->provider_id? 'selected':'' }} value="{{ $provider->id }}">{{ $provider->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Stock</label><input class="form-control" id="exampleFormControlInput1" type="number" placeholder="" name="stock" value="{{ $product->stock }}">
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