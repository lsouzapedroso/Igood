<?php

namespace App\Listeners;

use App\Jobs\ProcessStudentDataJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;

class JobProcessed
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
     * @param  JobProcessed $event
     * @return void
     */
    public function handle(JobProcessed $event)
    {
        // Verificar se ainda há itens na fila
        if (Redis::llen('student-processing') > 0) {
            // Obter o próximo ID do aluno da fila
            $studentId = Redis::lpop('student-processing');

            // Iniciar o próximo Job de processamento do aluno
            ProcessStudentDataJob::dispatch($studentId);
        }
    }
}
