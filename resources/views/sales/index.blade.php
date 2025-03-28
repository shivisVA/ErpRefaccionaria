@extends('layouts.app')

@section('content')

<div class="container mt-n10">
   
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Ventas</div>

        <div class="card-body">
             <a class="btn btn-primary" href="{{ route('sales.create') }}">Nuevo</a>
            <div class="datatable">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sales as $sale)

                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ $sale->client->name }}</td>
                                <td>{{ $sale->date }}</td>
                                <td>{{ $sale->total }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('saleDetails.index',$sale->id) }}" >Ver</button>
                                    <a class="btn btn-primary btn-sm" href="">Editar</a>
                                    <form action="" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                    </form>
                                </td>
                            </tr>        

                        @endforeach
                                      
                    </tbody>
                </table>
                 
            </div>
        </div>
    </div>
</div>
@endsection