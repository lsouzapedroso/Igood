<?php

namespace App\Http\Controllers\Gpt;

use App\Http\Controllers\Controller;
use App\Http\Requests\GptRequest;
use App\Http\Requests\SponteRequest;
use App\Jobs\SendMessagesJob;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GptMessageController extends Controller
{

    protected $request;


    /**
     * Create a new job instance.
     * @param Request $wpppconnect
     * @return void
     */
    public function __construct()
    {
        $this->request = new GptRequest();
    }

    public function action(Request $wpppconnect)
    {
        $data = json_decode($wpppconnect->getContent(), true);
        $message = $data['content'];
        $preSet = ', Voce é Krisin, uma professora de ingles virtual que ajuda alunos brasileiros a entenderem melhor, esclarecerem suas duvidas e tambem voce pode ter conversações em ingles. Lembre-se de usar o ingles e portugues como traducao para explicar o que tiver explicando. Alem disso, se o objetivo for ter uma conversa, mantenha sempre a conversa ativa, respeite e valorize as respostas dos usuarios, e caso tenha algum erro de gramatica corrija de forma amigavel. Sempre a primeira mensagem e a ultima tem que ser em ingles';
        $serializedId = $data['chatId'];
        $session = 'GPT';
        $dataMessagens = [
            'preSet' => $preSet,
            'message' => $message,
        ];

        $timeout = 10; // Defina seu tempo limite em segundos
        $start = time();
        $gptdata = null;

        while (is_null($gptdata) && (time() - $start) <= $timeout) {
            $gptdata = $this->request->completions($dataMessagens);
            sleep(1); // Aguarde 1 segundo antes de verificar novamente
        }
        Log::info($gptdata);
        Log::info('/n');
        if (!is_null($gptdata)) {
            $gptmessage = $gptdata['choices'][0]['message']['content'];
            $infos = [
                'session' => $session,
                'gptmessage' => $gptmessage,
                'serializedId' => $serializedId,

            ];
            SendMessagesJob::dispatch($infos);
        }else {
            Log::info('Tempo limite atingido');
        }
    }
}
