@extends('layouts.app')

@section('content')

<div class="container mt-n10">
   
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Categorias</div>

        <div class="card-body">
             <a class="btn btn-primary" href="{{ route('categories.create') }}">Nuevo</a>
            <div class="datatable">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $item)

                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" >Ver</button>
                                    <a class="btn btn-primary btn-sm" href="{{route('categories.edit', $item)}}">Editar</a>
                                    <form action="{{ route('categories.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                    </form>
                                </td>
                            </tr>        

                        @endforeach
                                      
                    </tbody>
                </table>
                 {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection