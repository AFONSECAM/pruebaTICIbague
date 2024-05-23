@extends('template.main')
@section('title', 'Empleados')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right">
                                    <a href="{{ route('employee.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                        Nuevo Empleado
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover text-center employeeTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Dirección</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Identificación</th>
                                            <th>Departamento</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->surname }}</td>
                                                <td>{{ $employee->address }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->identification_number }}</td>
                                                <td>{{ $employee->department->name }}</td>
                                                <td>
                                                    <form class="d-inline" action="{{ route('employee.edit', ['employee'=>$employee]) }}" method="GET">
                                                        <button type="submit" class="btn btn-success btn-sm mr-1">
                                                            <i class="fa-solid fa-pen"></i> Editar
                                                        </button>
                                                    </form>
                                                    <form class="d-inline" action="{{ route('employee.show', ['employee'=>$employee]) }}" method="GET">
                                                        <button type="submit" class="btn btn-success btn-sm mr-1">
                                                            <i class="fa-solid fa-pen"></i> Ver
                                                        </button>
                                                    </form>
                                                    <form class="d-inline" action="{{ route('employee.destroy', ['employee'=> $employee]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            id="btn-delete"><i class="fa-solid fa-trash-can"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
