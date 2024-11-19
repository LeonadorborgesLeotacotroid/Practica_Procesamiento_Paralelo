<?php

namespace App\Jobs;

use App\Models\Usuario;
use Faker\Factory as Faker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertUsersBatchJob implements ShouldQueue
{
    //metodos triats que permite la interaccion con la cola
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $batchSize;

    public function __construct($batchSize)
    {
        $this->batchSize = $batchSize; //se define el tamaño de los lotes que se asigna en el seeder
    }

    public function handle()
    {
        $faker = Faker::create();
        $users = []; // Array para almacenar los datos de los usuarios

        // for para generar datos ficticios para cada usuario en el lote
        for ($i = 0; $i < $this->batchSize; $i++) {
            $users[] = [
                'name' => $faker->name,
              
            ];
        }

        // Inserción masiva del lote
        Usuario::insert($users);
    }
}
