<?php

namespace App\Http\Controllers\Wppconnect;

use App\Http\Controllers\Controller;
use App\Models\WppconnectService;
use App\Models\WppconnectToken;
use WPPConnectTeam\Wppconnect\Facades\Wppconnect;

class CheckConnectionController extends Controller
{
    protected $url;
    protected $key;

    /**
     * __construct function
     */
    public function __construct()
    {
        $this->url = config('wppconnect.defaults.base_uri');
        $this->key = config('wppconnect.defaults.secret_key');
    }
    public function check($session)
    {
        $service = WppconnectService::where('service_name', $session)->first();

        if ($service == null) {
            $responseData= false;
        } else {
            $serviceId = $service->id;
            $sessionToken = WppconnectToken::where('session_id', $serviceId)->first();

            if ($sessionToken == null || $sessionToken->init == 0) {
                $responseData = false;
            } else {
                Wppconnect::make($this->url);
                $response = Wppconnect::to('/api/' . $session . '/check-connection-session')->withHeaders([
                    'Authorization' => 'Bearer ' . $sessionToken->token
                ])->asJson()->get();
                $responseData = json_decode($response->getBody()->getContents(), true);
            }
        }
        return $responseData;
    }
}
