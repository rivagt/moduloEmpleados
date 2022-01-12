<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Http\Requests\EmployeeRequest;
use App\Position;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = Employe::latest()->paginate();
        $deletedEmployees = Employe::onlyTrashed()->get();
        return view('home',compact('employees','deletedEmployees'));
    }
    public function create()
    {
        // return $positions;
        return view('employees.create');
    }
    public function store(EmployeeRequest $request)
    {
        Employe::create($request->validated());
        return redirect()->route('employees.index')->with('status', 'El project ha sido creado');
    }
    public function edit(Employe $employee)
    {
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }
    public function update(Employe $employee, EmployeeRequest $request)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('status', 'El project ha sido actualizado');

    }
    public function destroy(Employe $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('status', 'El empleado ha sido inactivado');
    }

    public function restore($request)
    {
        // return $request;
        $employee = Employe::withTrashed()->where('dni','=',$request)->firstOrFail();
        $employee->restore();
        return redirect()->route('employees.index')->with('status', 'El empleado ha sido activado');
    }

    public function forceDelete($request)
    {
        $employee = Employe::withTrashed()->where('dni','=',$request)->firstOrFail();
        $employee->forceDelete();
        return redirect()->route('employees.index')->with('status', 'El empleado ha sido eliminado permanentemente');
    }

    public function queryforarea()
    {
        $arg2 = request('area');
        $employees = Employe::where('area','=',$arg2)->latest()->paginate();
        return $employees;
    }
    public function queryforcargo()
    {
        $arg1 = request('cargo');
        $employees = Employe::where('cargo','=',$arg1)->latest()->paginate();
        return $employees;
    }
}
