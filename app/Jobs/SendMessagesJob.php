<?php

namespace App\Jobs;

use App\Models\WppconnectService;
use App\Models\WppconnectToken;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use WPPConnectTeam\Wppconnect\Facades\Wppconnect;

class SendMessagesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @param string $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->url = config('wppconnect.defaults.base_uri');
        $this->key = config('wppconnect.defaults.secret_key');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $randomDelay = rand(0, 60);
//        sleep($randomDelay);

        $session = $this->data['session'];
        $messagesToSend = $this->data['gptmessage'];
        $serializedId = $this->data['serializedId'];

        $service = WppconnectService::where('service_name', $session)->first();
        $serviceId = $service->id;
        $sessionToken = WppconnectToken::where('session_id', $serviceId)->first();

        Wppconnect::make($this->url);
        $response = Wppconnect::to('/api/' . $session . '/send-message')->withBody([
            'phone' => $serializedId,
            'message' => $messagesToSend,
            'isGroup' => false
        ])->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $sessionToken->token
        ])->asJson()->post();
        $response = json_decode($response->getBody()->getContents(), true);
    }
}
