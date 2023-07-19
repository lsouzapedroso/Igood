<?php

namespace App\Http\Controllers\SponteContollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SponteRequest;
use App\Jobs\ProcessResponsableDataJob;
use App\Jobs\ProcessStudentDataJob;
use App\Models\ClassRegistration;
use App\Models\ClassSituations;
use App\Models\ResponsibleStudents;
use App\Models\SponteClassesAll;
use App\Models\SponteResponsibles;
use App\Models\SponteResponsiblesAll;
use App\Models\SponteStudent;
use Illuminate\Support\Facades\Schema;

class SponteResponsiblesController extends Controller
{
    public function newSearch()
    {
        SponteResponsiblesAll::truncate();
        $request = new SponteRequest();
        $responsibles = $request->getResponsibles();


        foreach ($responsibles as $responsible) {

            if (isset($responsible['responsible_id'])) {
                $responsibleId = $responsible['responsible_id'];
            }
            if (isset($responsible['cell_phone'])) {
                $cellPhone = $responsible['cell_phone'];
            }
            if (isset($responsible['spontenet_username'])) {
                $spontenetUsername = $responsible['spontenet_username'];
            }
            if (isset($responsible['spontenet_password'])) {
                $spontenetPassword = $responsible['spontenet_password'];
            }


            $SponteClassesAll = SponteResponsiblesAll::create([

                "name" => $responsible['name'],
                "responsible_id" => $responsibleId,
                "cell_phone" => $cellPhone,
                "email" => $responsible['email'],
                "birthdate" => $responsible['birthdate'],
                "spontenet_username" => $spontenetUsername,
                "spontenet_password" => $spontenetPassword,

            ]);
        }
        dd('ok');
    }

    public function store()
    {
        Schema::disableForeignKeyConstraints();
        SponteResponsibles::truncate();
        ResponsibleStudents::truncate();
        Schema::enableForeignKeyConstraints();

        $responsibles = SponteResponsiblesAll::all();

        foreach ($responsibles as $responsible) {

            $responsibleData = json_encode($responsible);
            ProcessResponsableDataJob::dispatch($responsibleData);
        }
        return response()->json(['message' => 'Requisições enviadas para processamento assíncrono.']);
    }
}
