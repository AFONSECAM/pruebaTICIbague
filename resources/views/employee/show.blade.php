@extends('template.main')
@section('title', 'Mi perfil')
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

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="/assets/dist/img/user2-160x160.jpg" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ $employee->name }}</h3>
                                <p class="text-muted text-center">{{ $employee->department->name }}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Dirección</b> <a class="float-right">{{ $employee->address }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $employee->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Teléfono</b> <a class="float-right">{{ $employee->phone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Número identificación</b> <a class="float-right">{{ $employee->identification_number }}</a>
                                    </li>
                                </ul>
                                <a href="/dashboard" class="btn btn-primary btn-block"><b>Volver</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
