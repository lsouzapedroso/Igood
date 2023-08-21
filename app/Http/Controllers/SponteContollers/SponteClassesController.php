<?php

namespace App\Http\Controllers\SponteContollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SponteRequest;
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
        $modalityToSave = [2,7];

        foreach ($classes as $item) {
            $situation = $item['situation'];
            if (isset($item['modalidade_id'])) {
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

                    $SponteClassesAll = SponteClassesAll::create([
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
    public function store()
    {
        $classes = SponteClassesAll::all();
        ClassMember::truncate();
        ClassSchedule::truncate();
        Schema::disableForeignKeyConstraints();
        SponteClasses::truncate();
        Schema::enableForeignKeyConstraints();

        $request = new SponteRequest();

        foreach ($classes as $class)
        {
            $classId = $class ->class_id;
            $data = $request->postSearch($classId);

            $responseData = SponteClasses::create([
                'class_id' => $data['class_id'],
                'name' => $data['name'],
                'professor_id' => $data['professor_id'],
                'professor_name' => $data['professor_name'],
                'capacity' => $data['capacity'],
                'semester' => $data['semester'],
                'time' => $data['time'],
            ]);
            $membersData = $data['members'];
            foreach ($membersData as $memberData) {
                $memberData = ClassMember::create([
                    'class_id' => $data['class_id'],
                    'student_id' => $memberData['student_id'],
                    'start_date' => $memberData['start_date'],
                ]);
            }
            $scheduleData = $data['schedule'];
            foreach ($scheduleData as $schedule) {
                $schedule = ClassSchedule::create([
                    'class_id' => $data['class_id'],
                    'schedule_date' => $schedule['schedule_date'],
                    'lesson' => $schedule['lesson'],
                    'phase' => $schedule['phase'],
                    'professor' => $schedule['professor'],
                    'situation' => $schedule['situation'],
                ]);
            }
        }
    dd('ok-store');
    }
}


