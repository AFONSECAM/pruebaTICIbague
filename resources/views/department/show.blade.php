@extends('template.main')
@section('title', 'Departamento')
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
                            <li class="breadcrumb-item active">@yield('title') {{$department->name}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="text-right">
                                <a href="{{ route('department.index') }}" class="btn btn-warning btn-sm"><i
                                        class="fa-solid fa-arrow-rotate-left"></i>
                                    Atrás
                                </a>
                            </div>
                            <div class="card-body box-profile">
                                <h3 class="profile-username text-center">{{ $department->name }}</h3>                                                          
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Usuarios asociados
                                    <span class="badge bg-success"> 
                                        {{ count($department->employees) }}
                                    </span>                                    
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($department->employees as $employee )
                                        <div class="col-3">
                                            <a href="{{ route('employee.show', ['employee'=>$employee]) }}"><i class="fas fa-person mr-1"></i> {{ $employee->name }}</a>
                                        </div>
                                    @endforeach                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
