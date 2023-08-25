<?php

namespace App\Http\Controllers\SponteContollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SponteRequest;
use App\Jobs\ProcessSponteClassesJob;
use App\Models\ClassMember;
use App\Models\ClassSchedule;
use App\Models\SponteClasses;
use App\Models\SponteClassesAll;
use Illuminate\Support\Facades\Schema;

class SponteClassesController extends Controller
{
    public function newSearch()
    {
        SponteClassesAll::truncate();
        $request = new SponteRequest();
        $classes = $request->getClasses();
        $situationToSave = [1, 3];
        $modalityToSave = [2, 7];


        foreach ($classes as $item) {

            $situation = $item['situation'];
            if (!isset($item['modalidade_id'])) {
                continue;
            } else {
                $modality = $item['modalidade_id'];

                if ((in_array($situation, $situationToSave)) && (in_array($modality, $modalityToSave))) {

                    if (isset($item['class_id'])) {
                        $classId = $item['class_id'];
                    }
                    if (isset($item['name'])) {
                        $name = $item['name'];
                    }
                    if (isset($item['situation'])) {
                        $situation = $item['situation'];
                    }
                    if (isset($item['modalidade_id'])) {
                        $modalidadeId = $item['modalidade_id'];
                    }
                    if (isset($item['modalidade'])) {
                        $modalidade = $item['modalidade'];
                    }
                    if (isset($item['time'])) {
                        $time = $item['time'];
                    }

                    SponteClassesAll::create([
                        "class_id" => $classId,
                        "name" => $name,
                        "situation" => $situation,
                        "modalidade_id" => $modalidadeId,
                        "modalidade" => $modalidade,
                        "time" => $time,
                        "check" => false,
                    ]);
                }
            }
        }
        dd('ok');
    }

    public
    function store()
    {
        $classes = SponteClassesAll::all();
        ClassMember::truncate();
        ClassSchedule::truncate();
        Schema::disableForeignKeyConstraints();
        SponteClasses::truncate();
        Schema::enableForeignKeyConstraints();

        $request = new SponteRequest();

        foreach ($classes as $class) {
            $classId = $class->class_id;
            ProcessSponteClassesJob::dispatch($classId);
        }
        dd('ok-store');
    }
}


