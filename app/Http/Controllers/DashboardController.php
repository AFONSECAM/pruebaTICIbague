<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::count();
        $departments = Department::count();

        return view('dashboard.dashboard', [
            'employee' => $employees,
            'department' => $departments
        ]);
    }
}
