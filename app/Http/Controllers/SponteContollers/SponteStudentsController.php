<?php

namespace App\Http\Controllers\SponteContollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SponteRequest;
use App\Jobs\ProcessStudentDataJob;
use App\Models\ClassMember;
use App\Models\ClassRegistration;
use App\Models\ClassSituations;
use App\Models\SponteClassesAll;
use App\Models\SponteStudent;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redis;

class SponteStudentsController extends Controller
{
    /*    public function newSearch()
        {
            SponteStudent::truncate();
            $request = new SponteRequest();
            $$students = $request->getStudents();
            foreach ($$students as $employee) {

                if (isset($employee['employee_id'])) {
                    $employeeId = $employee['employee_id'];
                }
                if (isset($employee['name'])) {
                    $name = $employee['name'];
                }
                $Sponte$studentsAll = Sponte$studentsAll::create([
                    "employee_id" => $employeeId,
                    "name" => $name,
                ]);
            }
            dd('ok');
        }*/

    public function store()
    {
        Schema::disableForeignKeyConstraints();
        ClassRegistration::truncate();
        ClassSituations::truncate();
        SponteStudent::truncate();
        Schema::enableForeignKeyConstraints();
        $classes = SponteClassesAll::all();

        foreach ($classes as $class) {
            $jsonData = json_encode($class);
            ProcessStudentDataJob::dispatch($jsonData);
        }
        return response()->json(['message' => 'Requisições enviadas para processamento assíncrono.']);
    }
}
