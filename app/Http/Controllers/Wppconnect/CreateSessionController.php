<?php

namespace App\Http\Controllers\Wppconnect;

use App\Http\Controllers\Controller;
use App\Models\WppconnectService;
use App\Models\WppconnectToken;
use WPPConnectTeam\Wppconnect\Facades\Wppconnect;

class CreateSessionController extends Controller
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
        if (!WppconnectService::where('service_name', $session)->first()) {
            WppconnectService::create([
                'service_name' => $session,
            ]);
        }

        $service = WppconnectService::where('service_name', $session)->first();
        $serviceId = $service->id;
        $sessionToken = WppconnectToken::where('session_id', $serviceId)->first();

        $connect = (new CheckConnectionController)->check($session);

        if (!$connect) {

            #Function: Generated Token
            # /api/:session/generate-token

            if ($sessionToken) {
                WppconnectToken::where('id', $sessionToken->id)->delete();
            }

            Wppconnect::make($this->url);
            $response = Wppconnect::to('/api/' . $session . '/' . $this->key . '/generate-token')->asJson()->post();
            $response = json_decode($response->getBody()->getContents(), true);
            if ($response['status'] == 'success'):
                WppconnectToken::create([
                    'token' => $response['token'],
                    'session_id' => $serviceId,
                    'init' => false,
                ]);
            endif;
            return false;
        }
        return true;
    }

    public function create($session)
    {

        $service = WppconnectService::where('service_name', $session)->first();
        $serviceId = $service->id;
        $sessionInfo = WppconnectToken::where('session_id', $service->id)->where('init', false)->first();
        $init = $sessionInfo->init;
        $sessionId = $sessionInfo->session_id;

        if (($serviceId == $sessionId) && (!$init)) {
            #Function: Start Session
            # /api/:session/start-session

            $sessionToken = WppconnectToken::where('session_id', $serviceId)->first();

            if (($sessionToken->token) and ($sessionToken->session_id == $serviceId) and ($sessionToken->init == 0)):
                Wppconnect::make($this->url);
                $response = Wppconnect::to('/api/' . $session . '/start-session')->withHeaders([
                    'Authorization' => 'Bearer ' . $sessionToken->token
                ])->asJson()->post();
                $response = json_decode($response->getBody()->getContents(), true);
                sleep(10);

                Wppconnect::make($this->url);
                $response = Wppconnect::to('/api/' . $session . '/status-session')->withHeaders([
                    'Authorization' => 'Bearer ' . $sessionToken->token
                ])->asJson()->get();


                $responseData = json_decode($response->getBody()->getContents(), true);
                $qrCode = $responseData['qrcode'] ?? null;
                $urlCode = $responseData['urlcode'] ?? null;



                while ($qrCode === null) {

                    Wppconnect::make($this->url);
                    $response = Wppconnect::to('/api/' . $session . '/status-session')->withHeaders([
                        'Authorization' => 'Bearer ' . $sessionToken->token
                    ])->asJson()->get();

                    if ($response->getStatusCode() === 200) {
                        $responseData = json_decode($response->getBody()->getContents(), true);
                        $qrCode = $responseData['qrcode'] ?? null;
                        $urlCode = $responseData['urlcode'] ?? null;

                        if ($qrCode === null) {
                            // Aguarde um tempo antes de fazer a próxima tentativa (opcional)
                            sleep(1);
                        }
                    }else {
                        $qrCode = null;
                    }

                }

                $data = explode(',', $qrCode);
                $imageType = explode(';', $data[0])[0];
                $encodedData = $data[1];

                // Decodifica os dados base64
                $decodedData = base64_decode($encodedData);

                // Cria um arquivo temporário para a imagem
                $tempFileName = tempnam(sys_get_temp_dir(), 'img');
                $tempFile = fopen($tempFileName, 'wb');
                fwrite($tempFile, $decodedData);
                fclose($tempFile);

                // Cria uma imagem a partir do arquivo temporário
                $image = imagecreatefromstring(file_get_contents($tempFileName));

                // Você pode exibir a imagem na página da web usando a função imagepng (ou imagejpeg, imagegif, etc.)
                // Neste exemplo, vou salvar a imagem em um arquivo no diretório atual
                $outputFile = 'output.png';
                imagepng($image, $outputFile);
                $imageData = file_get_contents($outputFile);

                // Libera a memória alocada pela imagem e remove o arquivo temporário
                imagedestroy($image);
                unlink($tempFileName);
                return $imageData;
            endif;
        }
    }
}
