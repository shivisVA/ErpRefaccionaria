@extends('layouts.app')

@section('content')
<div class="container mt-n10">
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Nuevo Usuario</div>
                        <div class="card-body">

                            @if($user->id==null) 
                                <form action="{{ route('users.store') }}" method="post">
                            @else
                                <form action="{{ route('users.update',$user) }}" method="post">           
                                    @method('put')
                            @endif

                                    @csrf
                            
                                    <!-- Form Group (username)-->
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputName">Nombre</label>
                                        <input class="form-control" name="name" type="text" placeholder="Enter your name" value="{{ $user->name }}" />
                                    </div>
                                   
                                    <!-- Form Group (email address)-->
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                        <input class="form-control" name="email" type="email" placeholder="Enter your email address" value="{{ $user->email }}" />
                                    </div>
                                     <!-- Form Group (password)-->
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Password</label>
                                        <input class="form-control" name="password" type="password" placeholder="" value="password" />
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </form>
                          
                </div>
            </div>
        </div>
    </div>
</div>

@endsection