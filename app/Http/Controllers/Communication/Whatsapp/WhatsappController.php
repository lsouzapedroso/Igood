<?php

namespace App\Http\Controllers\Communication\Whatsapp;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Wppconnect\CreateSessionController;
use App\Models\Message;
use App\Models\WppconnectService;
use App\Models\WppconnectToken;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use WPPConnectTeam\Wppconnect\Facades\Wppconnect;


class WhatsappController extends Controller
{
    protected $url;
    protected $key;
    protected $session;

    /**
     * __construct function
     */
    public function __construct()
    {
        $this->session = "groups";
    }

    public function index()
    {
        $user = auth()->user();
        $accessLevel = $user->access_level;
        $Messages = Message::All();

        $connect = (new CreateSessionController)->check($this->session);

        if ($connect === true) {
            return view('communication.whatsapp.groups', ['Messages' => $Messages], compact('accessLevel'));
        } else {
            $imageData = (new CreateSessionController)->create($this->session);
            return view('communication.whatsapp.qrcode',  ['imageData' => $imageData] , compact('accessLevel'));
        }

    }

    public function check()
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
        return redirect()->Route('groups-message', compact('accessLevel'));
    }
}
