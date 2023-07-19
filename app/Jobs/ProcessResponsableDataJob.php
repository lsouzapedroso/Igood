<?php

namespace App\Jobs;

use App\Http\Requests\SponteRequest;
use App\Models\ClassMember;
use App\Models\ClassRegistration;
use App\Models\ClassSituations;
use App\Models\ResponsibleStudents;
use App\Models\SponteClassesAll;
use App\Models\SponteResponsibles;
use App\Models\SponteResponsiblesAll;
use App\Models\SponteStudent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class ProcessResponsableDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $responsibleData;

    protected $responsibleId;

    /**
     * Create a new job instance.
     *
     * @param  string  $responsibleData
     * @return void
     */
    public function __construct($responsibleData)
    {
        $this->responsibleData = $responsibleData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $request = new SponteRequest();

        $responsibleData = $this->responsibleData;
        $responsible = json_decode($responsibleData);
        $responsableId = $responsible->responsible_id;

        $datas = $request->postSearchResponsibles($responsableId);

        foreach ($datas as $data) {
            $responsiblestudents = $data['responsible_students'];
            foreach ($responsiblestudents as $responsiblestudent) {

                $studentId = $responsiblestudent['student_id'];
                $existingStudent = SponteStudent::where('student_id', $studentId)->first();
                $existingResponsible = SponteResponsibles::where('responsible_id', $responsableId)->first();

                if ($existingStudent && !$existingResponsible) {

                    if (isset($data['name'])) {
                        $name = $data['name'];
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
                    if (isset($data['business_phone'])) {
                        $businessPhone = $data['business_phone'];
                    }
                    if (isset($data['additional_address_data'])) {
                        $additionalAddressData = $data['additional_address_data'];
                    }
                    if (isset($data['spontenet_username'])) {
                        $spontenetUsername = $data['spontenet_username'];
                    }
                    if (isset($data['spontenet_password'])) {
                        $spontenetPassword = $data['spontenet_password'];
                    }
                    SponteResponsibles::create([
                        'responsible_id' => $responsableId,
                        'name' => $name,
                        'address' => $data['address'],
                        'number' => $data['number'],
                        'district' => $data['district'],
                        'city' => $data['city'],
                        'state' => $data['state'],
                        'zip_code' => $zipCode,
                        'home_phone' => $homePhone,
                        'cell_phone' => $cellPhone,
                        'email' => $data['email'],
                        'business_phone' => $businessPhone,
                        'job' => $data['job'],
                        'observation' => $data['observation'],
                        'birthdate' => $data['birthdate'],
                        'cpf' => $data['cpf'],
                        'rg' => $data['rg'],
                        'additional_address_data' => $additionalAddressData,
                        'spontenet_username' => $spontenetUsername,
                        'spontenet_password' => $spontenetPassword,
                        'gender' => $data['gender'],
                    ]);
                    $responsiblestudents = $data['responsible_students'];

                    $existingResponsibleStudents = ResponsibleStudents::where('responsible_id', $responsableId)->first();

                    if (!$existingResponsibleStudents) {
                        foreach ($responsiblestudents as $responsiblestudent) {
                            ResponsibleStudents::create([
                                'responsible_id' => $responsableId,
                                'name' => $responsiblestudent['name'],
                                'student_id' => $responsiblestudent['student_id'],
                            ]);
                        }
                    }
                }
            }
        }
        Redis::srem('responsable-processing', $this->responsibleId);
    }

}
