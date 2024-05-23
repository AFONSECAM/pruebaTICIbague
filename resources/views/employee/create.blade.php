@extends('template.main')
@section('title', 'Agregar Empleado')
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
                            <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Empleados</a></li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right">
                                    <a href="{{ route('employee.index') }}" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Atrás
                                    </a>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate action="{{ route('employee.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="identification_number">Número identificación (CC)</label>
                                                <input type="text" name="identification_number"
                                                    class="form-control @error('identification_number') is-invalid @enderror" id="identification_number"
                                                    placeholder="Nombre(s)" value="{{ old('identification_number') }}" required>
                                                @error('identification_number')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Nombre(s)</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    placeholder="Nombre(s)" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="surname">Apellido(s)</label>
                                                <input type="text" name="surname"
                                                    class="form-control @error('surname') is-invalid @enderror"
                                                    id="surname" placeholder="Apellido(s)" value="{{ old('surname') }}"
                                                    required>
                                                @error('surname')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="address">Dirección residencia</label>
                                                <input type="text" name="address"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    id="address" placeholder="Dirección residencia" value="{{ old('address') }}"
                                                    required>
                                                @error('address')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="phone">Número teléfono</label>
                                                <input type="text" name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    placeholder="Número teléfono" value="{{ old('phone') }}" required>
                                                @error('phone')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" placeholder="Dirección correo electrónico" value="{{ old('email') }}"
                                                    required>
                                                @error('email')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="department_id">Departamento</label>
                                                <select name="department_id"  class="form-control @error('department_id') is-invalid @enderror"
                                                    id="department_id" required>
                                                    <option value="">Seleccione una opción</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('department_id')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-dark mr-1" type="reset"><i
                                            class="fa-solid fa-arrows-rotate"></i>
                                        Cancelar</button>
                                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                        Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.content -->
                </div>
            </div>
        </div>
    </div>

@endsection
