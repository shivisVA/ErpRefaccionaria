@extends('layouts.app')

@section('content')

<div class="container mt-n10">
   
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Clientes</div>
        <div class="card-body">
             <a class="btn btn-primary" href="{{ route('clients.create') }}">Nuevo</a>
            <div class="datatable">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <th>{{ $client->id }}</th>
                            <th>{{ $client->name }}</th>
                            <th>{{ $client->phone }}</th>
                            <th>{{ $client->email }}</th>
                            <th>{{ $client->address }}</th>
                            <th>
                                <button class="btn btn-primary btn-sm" >Ver</button>
                                <a class="btn btn-primary btn-sm" href="{{ route('clients.edit',$client) }}">Editar</a>
                                <form action="{{ route('clients.destroy',$client->id) }}" method="post">
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