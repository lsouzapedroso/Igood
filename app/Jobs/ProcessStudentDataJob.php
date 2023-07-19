<?php

namespace App\Jobs;

use App\Models\ClassMember;
use App\Models\ClassRegistration;
use App\Models\ClassSituations;
use App\Models\SponteClassesAll;
use App\Models\SponteStudent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\SponteRequest;
use Illuminate\Support\Facades\Redis;


class ProcessStudentDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $jsonData;
    protected $studentId;

    /**
     * Create a new job instance.
     *
     * @param  string  $jsonData
     * @return void
     */
    public function __construct($jsonData)
    {
        $this->jsonData = $jsonData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $students = ClassMember::all();
        $request = new SponteRequest();
        $jsonData = $this->jsonData;
        $class = json_decode($jsonData);


        foreach ($students as $student) {
            $classId = $class->class_id;
            $classCheck = $class->check;
            $studentClassId = $student->class_id;
            $modalidadeId = $class->modalidade_id;

                    if ($classCheck == 0 && $classId == $studentClassId && $modalidadeId == 2 ) {
                        $studentId = $student->student_id;
                        $datas = $request->postSearchStudents($studentId);

                        foreach ($datas as $data) {

                            if (isset($data['student_id'])) {
                                $studentId = $data['student_id'];
                            }
                            if (isset($data['zip_code'])) {
                                $zipCode = $data['zip_code'];
                            }
                            if (isset($data['home_phone'])) {
                                $homePhone = $data['home_phone'];
                            }
                            if (isset($data['cell_phone'])) {
                                $cellPhone = $data['cell_phone'];
                            }
                            if (isset($data['spontenet_username'])) {
                                $spontenetUsername = $data['spontenet_username'];
                            }
                            if (isset($data['spontenet_password'])) {
                                $spontenetPassword = $data['spontenet_password'];
                            }
                            SponteStudent::create([
                                'student_id' => $studentId,
                                'name' => $data['name'],
                                'birthdate' => $data['birthdate'],
                                'gender' => $data['gender'],
                                'cpf' => $data['cpf'],
                                'rg' => $data['rg'],
                                'address' => $data['address'],
                                'number' => $data['number'],
                                'district' => $data['district'],
                                'city' => $data['city'],
                                'state' => $data['state'],
                                'zip_code' => $zipCode,
                                'home_phone' => $homePhone,
                                'cell_phone' => $cellPhone,
                                'job' => $data['job'],
                                'photo' => ' ',
                                'email' => $data['email'],
                                'spontenet_username' => $spontenetUsername,
                                'spontenet_password' => $spontenetPassword,
                            ]);
                        }
                        $situationData = $data['situation'];
                        foreach ($situationData as $situation) {
                            ClassSituations::create([
                                'student_id' => $studentId,
                                'situation_id' => $data['situation']['situation_id'],
                                'description' => $data['situation']['description'],
                            ]);
                        }

                        $registrations = $data['registrations'];
                        foreach ($registrations as $registrationData) {
                            if (isset($registrationData['contract_id'])) {
                                $contractId = $registrationData['contract_id'];
                            }
                            if (isset($registrationData['contract_interactive_id'])) {
                                $contractInteractiveId = $registrationData['contract_interactive_id'];
                            }
                            if (isset($registrationData['class_id'])) {
                                $classId = $registrationData['class_id'];
                            }
                            if (isset($registrationData['phase_id'])) {
                                $phaseId = $registrationData['phase_id'];
                            }
                            if (isset($registrationData['current_phase'])) {
                                $currentPhase = $registrationData['current_phase'];
                            }
                            ClassRegistration::create([
                                'student_id' => $studentId,
                                'contract_id' => $contractId,
                                'contract_interactive_id' => $contractInteractiveId,
                                'modality' => $registrationData['modality'],
                                'class_id' => $classId,
                                'phase_id' => $phaseId,
                                'current_phase' => $currentPhase,
                            ]);
                        }
                    }
        }
        SponteClassesAll::where('class_id', $classId)->update([
            'check' => true,
        ]);
        Redis::srem('student-processing', $this->studentId);
    }
}
