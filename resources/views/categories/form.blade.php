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
                                @if($category->id==null) 
                                    <form action="{{ route('categories.store') }}" method="post">
                                @else
                                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                                    @method('put')
                                @endif

                                    @csrf
                                    <div class="form-group">

                                        <label for="exampleFormControlInput1">Nombre</label><input class="form-control" id="exampleFormControlInput1" type="text" placeholder="name@example.com" name="name" value="{{ $category->name }}">
                                    </div>

                                    <div class="form-group"><label for="exampleFormControlTextarea1">Descripcion</label><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $category->description }}</textarea></div>
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