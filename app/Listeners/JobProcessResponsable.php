<?php

namespace App\Listeners;

use App\Jobs\ProcessResponsableDataJob;
use App\Jobs\ProcessStudentDataJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;

class JobProcessResponsable
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProcessResponsableDataJob  $event
     * @return void
     */
    public function handle(ProcessResponsableDataJob $event)
    {
        // Verificar se ainda há itens na fila
        if (Redis::llen('responsable-processing') > 0) {
            // Obter o próximo ID do aluno da fila
            $responsableId = Redis::lpop('responsable-processing');

            // Iniciar o próximo Job de processamento do aluno
            ProcessStudentDataJob::dispatch($responsableId);
        }
    }
}
