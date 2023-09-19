<?php

namespace App\Http\Livewire;

use App\Models\WppconnectService;
use App\Models\WppconnectToken;
use Livewire\Component;
use WPPConnectTeam\Wppconnect\Facades\Wppconnect;

class Qrcode extends Component
{
    protected $url;
    protected $key;
    protected $session;

    /**
     * __construct function
     */
    public function __construct()
    {
        $this->url = config('wppconnect.defaults.base_uri');
        $this->key = config('wppconnect.defaults.secret_key');
        $this->session = "front";
    }


    public function mount()
    {
        // Chama o método para atualização inicial
        $this->updateQrcode();

        // Agende a atualização a cada 1 minuto (60 segundos)
        $this->pollQrcode();
    }

    // Método para atualizar os dados do QR code
    public function updateQrcode()
    {
        // Sua lógica para obter/atualizar os dados do QR code aqui
        // Por exemplo, você pode definir $imageData com os novos dados do QR code
        $service = WppconnectService::where('service_name', $this->session)->first();
        $serviceId = $service->id;
        $session = WppconnectToken::where('session_id', $service->id)->where('init', false )->first();
        $init = $session->init;
        $sessionId = $session->session_id;

        if (($serviceId == $sessionId) && ($init == false )) {

            #Function: Start Session
            # /api/:session/start-session

            $sessionToken = WppconnectToken::where('session_id', $serviceId)->first();

            if (($sessionToken->token) and ($sessionToken->session_id == $serviceId) and ($sessionToken->init == 0)):
                Wppconnect::make($this->url);
                $response = Wppconnect::to('/api/' . $this->session . '/start-session')->withHeaders([
                    'Authorization' => 'Bearer ' . $sessionToken->token
                ])->asJson()->post();
                $response = json_decode($response->getBody()->getContents(), true);
                sleep(10);

                Wppconnect::make($this->url);
                $response = Wppconnect::to('/api/' . $this->session . '/status-session')->withHeaders([
                    'Authorization' => 'Bearer ' . $sessionToken->token
                ])->asJson()->get();


                $responseData = json_decode($response->getBody()->getContents(), true);
                $qrCode = $responseData['qrcode'] ?? null;
                $urlCode = $responseData['urlcode'] ?? null;


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
                //$imageData = file_get_contents($outputFile);
                $this->imageData = file_get_contents($outputFile);

                // Libera a memória alocada pela imagem e remove o arquivo temporário
                imagedestroy($image);
                unlink($tempFileName);
            endif;
        }
    }

    // Método para agendar a atualização a cada 1 minuto
    public function pollQrcode()
    {
        $this->updateQrcode(); // Atualiza imediatamente ao montar o componente

        // Chama o método 'updateQrcode' a cada 60 segundos (1 minuto)
        $this->pollingInterval = 60;
        $this->dispatchBrowserEvent('poll-qrcode', ['interval' => $this->pollingInterval]);
    }

    public function render()
    {
        return view('communication.whatsapp.qrcode', [
            'imageData' => $this->imageData,
        ]);
    }
}
