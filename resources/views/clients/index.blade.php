@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Clientes
                        <a class="btn btn-success btn-sm" href="{{ route('clients.create') }}">
                            <i class="fas fa-plus"></i>
                            Agregar un cliente
                        </a>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('updated'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            Editado correctamente
                        </div>
                    </div>
                </div>
            @endif
            @if(session('deleted'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            Borrado correctamente
                        </div>
                    </div>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($clients as $client)
                    <div class="col-sm-12 col-md-3">
                        <div class="card">
                            <div class="card-header bg-dark">
                                RFC: {{ $client->rfc }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $client->name }}</h5>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{ route('clients.destroy', $client) }}"
                                              method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <input
                                            onclick="return confirm('¿Deseas eliminar este ' +
                                             'elemento?');"
                                            type="submit" value="Eliminar"
                                            class="btn btn-danger">
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <a
                                            class="btn btn-warning"
                                            href="{{ route('clients.edit', $client) }}">
                                            Editar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

