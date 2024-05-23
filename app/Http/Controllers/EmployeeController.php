<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        return view('employee.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());
        Alert::success('Exito', 'El empleado se ha creado correctamente!');
        return redirect('employee');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('name', 'asc')->get();
        return view('employee.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        Alert::info('Exito', 'El empleado ha sido actualizado correctamente!');
        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            Alert::info('Exito', 'El empleado ' . $employee->name . ' ha sido eliminado correctamente!');
            return redirect('employee');
        } catch (Exception $ex) {
            Alert::warning('Error', 'No ha sido posible eliminar, ocurrió el siguiente problema:' . $ex);
            return redirect('employee');
        }
    }
}
