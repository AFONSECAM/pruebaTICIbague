<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('employees')->orderBy('name', 'asc')->get();
        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Department::create($request->all());
        Alert::success('Exito', 'El departamento se ha creado correctamente!');
        return redirect('department');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $department->update($request->all());
        Alert::info('Exito', 'El departamento ha sido actualizado correctamente!');
        return redirect('department');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();
            Alert::info('Exito', 'El departamento ' . $department->name . ' ha sido eliminado correctamente!');
            return redirect('department');
        } catch (Exception $ex) {
            Alert::warning('Error', 'No ha sido posible eliminar, ocurrió el siguiente problema:' . $ex);
            return redirect('department');
        }
    }
}
