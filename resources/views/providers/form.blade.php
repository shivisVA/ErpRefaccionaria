@extends('layouts.app')

@section('content')
<div class="container mt-n10">
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Nueva Categoria</div>
                  
                    <div class="card-body">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                @if($provider->id==null) 
                                    <form action="{{ route('providers.store') }}" method="post">
                                @else
                                    <form action="{{ route('providers.update',$provider) }}" method="post">
                                    @method('put')
                                @endif

                                    @csrf
                                     <div class="form-group">

                                        <label for="exampleFormControlInput1">Nombre</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="name" value="{{ $provider->name }}">
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Contacto</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="contact" value="{{ $provider->contact }}">
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Telefono</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="phone" value="{{ $provider->phone }}">
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Email</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="email" value="{{ $provider->email }}">
                                    </div>
                                    
                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Direccion</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="address" value="{{ $provider->address }}">
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