@extends('layouts.app')

@section('content')

<div class="container mt-n10">
   
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Usuarios</div>
        <div class="card-body">
             <a class="btn btn-primary" href="{{ route('users.create') }}">Nuevo Usuario</a>
            <div class="datatable">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email}}</th>
                            
                            <th>
                                <button class="btn btn-primary btn-sm" >Ver</button>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
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