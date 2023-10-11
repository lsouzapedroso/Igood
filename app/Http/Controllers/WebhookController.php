<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Gpt\GptMessageController;
use App\Http\Controllers\Gpt\GptSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    /**
     * @param Request $request
     * @return json
     */
    public function webhookHandler(Request $request){

        $data = json_decode($request->getContent(), true);
        $event = $data['event'];
        $session = $data['session'];

        //Log::info($session);

        if($event == 'onmessage' && $session == 'GPT') {
            (new GptMessageController)->action($request);
        }
        return response()->json('ok');
    }
}
