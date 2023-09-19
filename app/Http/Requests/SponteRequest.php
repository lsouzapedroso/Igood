<?php

namespace App\Http\Requests;

use App\Facades\ApiSponte;
use Illuminate\Foundation\Http\FormRequest;

class SponteRequest extends FormRequest
{

    protected $apiSponte;

    public function getClasses()
    {
        return ApiSponte::get('/classes')->json();
    }
    public function getEmployees()
    {
        return ApiSponte::get('/employees')->json();
    }
    public function getResponsibles()
    {
        return ApiSponte::get('/responsibles')->json();
    }

    public function postSearch($classId)
    {
        $response = ApiSponte::post('classes', [
            'class_id' => $classId
        ]);
        $responseData = $response->json();
        return $responseData;
    }

    public function postSearchEmployees($employeeId)
    {
        $response = ApiSponte::post('employees', [
            'employee_id' => $employeeId
        ]);
        $responseData = $response->json();
        return $responseData;
    }
    public function postSearchStudents($studentId)
    {
        $response = ApiSponte::post('students', [
            'student_id' => $studentId
        ]);
        $responseData = $response->json();
        return $responseData;
    }
    public function postSearchResponsibles($responsiblesId)
    {
        $response = ApiSponte::post('responsibles', [
            'responsible_id' => $responsiblesId,
            'only_students_app'=> false,
        ]);
        $responseData = $response->json();
        return $responseData;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
