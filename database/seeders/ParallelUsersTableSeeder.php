<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Jobs\InsertUsersBatchJob;

class ParallelUsersTableSeeder extends Seeder
{
    public function run()
    {
        $batchSize = 1000; // tamaño de cada lote
        $totalRecords = 10000; // la cantidad de usuarios que quiero

        // Marca el tiempo inicial
        $startTime = microtime(true);

        // Divide el trabajo total en lotes y lo llama  a la cola
        for ($i = 0; $i < $totalRecords / $batchSize; $i++) {
            InsertUsersBatchJob::dispatch($batchSize);// se llama el Job
        }

        // Marca el tiempo final
        $endTime = microtime(true);

        // Calculo del tiempo total 
        $executionTime = $endTime - $startTime;
        echo "El seeder tomó: " . round($executionTime, 2) . " segundos.\n";
    }
}
