@extends('template.main')
@section('title', 'Departamentos')
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
                                    <a href="{{ route('department.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                        Nuevo departamento
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover text-center departmentTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad Empleados</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)
                                            <tr>
                                                <td>{{ $department->name }}</td>
                                                <td>{{ count($department->employees) }}</td>
                                                <td>
                                                    <form class="d-inline" action="{{ route('department.edit', ['department'=>$department]) }}" method="GET">
                                                        <button type="submit" class="btn btn-success btn-sm mr-1">
                                                            <i class="fa-solid fa-pen"></i> Editar
                                                        </button>
                                                    </form>
                                                    <form class="d-inline" action="{{ route('department.show', ['department'=>$department]) }}" method="GET">
                                                        <button type="submit" class="btn btn-info btn-sm mr-1">
                                                            <i class="fa-solid fa-eye"></i> Ver
                                                        </button>
                                                    </form>
                                                    <form class="d-inline" action="{{ route('department.destroy', ['department'=> $department]) }}"
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
