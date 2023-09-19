<?php

namespace App\Http\Requests;

use App\Facades\ApiGpt;
use Illuminate\Foundation\Http\FormRequest;

class GptRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function completions($dataMessagens)
    {
        $response = ApiGpt::post('chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are'],
                ['role' => 'user', 'content' => $dataMessagens['message']],
            ],
//            [
//                ['role' => 'system', 'content' => 'You are'],
//                ['role' => 'user', 'content' => $dataMessagens['message']],
//            ],
        ]);
        $responseData = $response->json();
        return $response;
    }
}
