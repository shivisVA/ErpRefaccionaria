@extends('layouts.app')

@section('content')

<div class="container mt-n10">
   
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Productos</div>
        <div class="card-body">
             <a class="btn btn-primary" href="{{ route('products.create') }} ">Nuevo</a>
            <div class="datatable">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Categoria</th>
                            <th>Proveedor</th>
                            <th>Precio de Venta</th>
                            <th>Precio de Costo</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->category->name}}</th>
                            <th>{{ $item->provider->name}}</th>
                            <th>{{ $item->price}}</th>
                            <th>{{ $item->cost }}</th>
                            <th>
                                <button class="btn btn-primary btn-sm" >Ver</button>
                                <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$item) }}">Editar</a>
                                <form action="{{ route('products.destroy',$item) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection