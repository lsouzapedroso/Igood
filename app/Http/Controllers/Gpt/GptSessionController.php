<?php

namespace App\Http\Controllers\Gpt;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Wppconnect\CheckConnectionController;
use App\Http\Controllers\Wppconnect\CreateSessionController;
use App\Models\WppconnectService;
use App\Models\WppconnectToken;
use Illuminate\Support\Facades\Log;

class GptSessionController extends Controller
{
    public function __construct()
    {
        $this->session = "GPT";
    }

    public function index()
    {
        $user = auth()->user();
        $accessLevel = $user->access_level;

        $connect = (new CreateSessionController)->check($this->session);

        if($connect === true ){
            return view('gpt.index', compact('accessLevel'));
        }else{
            $imageData = (new CreateSessionController)->create($this->session);
            return view('gpt.qrcode', ['imageData' => $imageData], compact('accessLevel'));
        }
    }

    public function check()
    {
        {
            $user = auth()->user();
            $accessLevel = $user->access_level;
            $service = WppconnectService::where('service_name', $this->session)->first();
            $session = WppconnectToken::where('session_id', $service->id)->first();
            $sessionId = $session->id;
            WppconnectToken::where('id', $sessionId)
                ->update([
                    'init' => true,
                ]);
            return $this->index();
        }
    }
}
