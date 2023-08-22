<?php

namespace App\Jobs;

use App\Http\Requests\SponteRequest;
use App\Models\SponteEmployees;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSponteEmployeesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;
    protected $employeeId;

    /**
     * Create a new job instance.
     * @param string $employeeId
     * @return void
     */
    public function __construct(string $employeeId)
    {
        $this->request = new SponteRequest();
        $this->employeeId =$employeeId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $employeeId = $this->employeeId;
        $data = $this->request->postSearchEmployees($employeeId);

        if (isset($data['full_name'])) {
            $fullName = $data['full_name'];
        }
        if (isset($data['marital_status_id'])) {
            $maritalStatusId = $data['marital_status_id'];
        }
        if (isset($data['city_id'])) {
            $cityId = $data['city_id'];
        }
        if (isset($data['district_id'])) {
            $districtId = $data['district_id'];
        }
        if (isset($data['user_id'])) {
            $userId = $data['user_id'];
        }
        if (isset($data['function_id'])) {
            $functionId = $data['function_id'];
        }
        if (isset($data['additional_address_data'])) {
            $additionalAddressData = $data['additional_address_data'];
        }
        if (isset($data['zip_code'])) {
            $zip_code = $data['zip_code'];
        }
        if (isset($data['home_phone'])) {
            $homePhone = $data['home_phone'];
        }
        if (isset($data['cell_phone'])) {
            $cellPhone = $data['cell_phone'];
        }
        if (isset($data['class_hour_value'])) {
            $classHourValue = $data['class_hour_value'];
        }
        if (isset($data['external_class_hour_value'])) {
            $externalClassHourValue = $data['external_class_hour_value'];
        }
        if (isset($data['payment_type'])) {
            $paymentType = $data['payment_type'];
        }
        if (isset($data['spontenet_password'])) {
            $spontenetPassword = $data['spontenet_password'];
        }
        SponteEmployees::create([
            'name' => $data['name'],
            'full_name' => $fullName,
            'marital_status_id' => $maritalStatusId,
            'city_id' =>$cityId,
            'district_id' => $districtId,
            'user_id' => $userId,
            'function_id' => $functionId,
            'gender' => $data['gender'],
            'birthdate' => $data['birthdate'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            'address' => $data['address'],
            'additional_address_data' => $additionalAddressData,
            'zip_code' => $zip_code,
            'home_phone' => $homePhone,
            'cell_phone' => $cellPhone,
            'salary' => $data['salary'],
            'observation' => $data['observation'],
            'teacher' => $data['teacher'],
            'active' => $data['active'],
            'class_hour_value' => $classHourValue,
            'external_class_hour_value' => $externalClassHourValue,
            'inss' => $data['inss'],
            'payment_type' => $paymentType,
            'email' => $data['email'],
            'agency' => $data['agency'],
            'account' => $data['account'],
            'spontenet_password' => $spontenetPassword,
        ]);

    }
}
