<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Employe;
use App\Http\Requests\ContractRequest;

class ContractController extends Controller
{
    public function create(Employe $employee)
    {
        return view('contract.create',compact('employee'));
    }
    public function store(Employe $employee, ContractRequest $request)
    {
        if ($employee) {
            $contract = new Contract($request->validated());
            $contract->employe_id = $employee->id;
            $contract->save();
            return redirect()->route('employees.index')->with('status', 'El contrato ha sido creado');
        }
        return back()->with('status', 'No existe dni');
    }
    public function index()
    {
        $contracts = Contract::with('employe')->latest()->paginate();
        // return $contracts;
        // return $contracts;
        return view('contract.index',[
            'contracts' => $contracts
        ]);
    }
}
