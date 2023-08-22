<?php

namespace App\Http\Controllers\SponteContollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SponteRequest;
use App\Jobs\ProcessSponteEmployeesJob;
use App\Models\SponteEmployees;
use App\Models\SponteEmployeesAll;

class SponteEmployeesController extends Controller
{
    public function newSearch()
    {
        SponteEmployeesAll::truncate();
        $request = new SponteRequest();
        $employees = $request->getEmployees();
        foreach ($employees as $employee) {

            if (isset($employee['employee_id'])) {
                $employeeId = $employee['employee_id'];
            }
            if (isset($employee['name'])) {
                $name = $employee['name'];
            }
            $SponteEmployeesAll = SponteEmployeesAll::create([
                    "employee_id" => $employeeId,
                    "name" => $name,
            ]);
        }
        dd('ok');
    }

    public function store()
    {
        try {
        $employees = SponteEmployeesAll::all();
        SponteEmployees::truncate();

        foreach ($employees as $employee)
        {
            $employeeId = $employee->employee_id;
            ProcessSponteEmployeesJob::dispatch($employeeId);
        }
        dd('ok');
        } catch (\Exception $e) {
            dd('erro: ' . $e->getMessage());
        }
    }
}
