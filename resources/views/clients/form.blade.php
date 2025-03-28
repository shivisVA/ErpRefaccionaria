@extends('layouts.app')

@section('content')
<div class="container mt-n10">
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Nueva Cliente</div>
                  
                    <div class="card-body">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                @if($client->id==null) 
                                    <form action="{{ route('clients.store') }}" method="post">
                                @else
                                    <form action="{{ route('clients.update',$client->id) }}" method="post">
                                    @method('put')
                                @endif

                                    @csrf
                                     <div class="form-group">

                                        <label for="exampleFormControlInput1">Nombre</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="name" value="{{ $client->name }}">
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Telefono</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="phone" value="{{ $client->phone }}">
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Email</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="email" value="{{ $client->email }}">
                                    </div>
                                    
                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Direccion</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="address" value="{{ $client->address }}">
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