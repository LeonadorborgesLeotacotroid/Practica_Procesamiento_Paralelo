<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SequentialUsersTableSeeder extends Seeder
{
    public function run()
    {
        // Marca el tiempo inicial
        $startTime = microtime(true);

        //creamos con faker con su funcion de crear
        $faker = Faker::create();

        //simple arreglo que permite la inserccion de datos
        for ($i = 0; $i < 10000; $i++) {
            Usuario::create([
                'name' => $faker->name,
            ]);
        }

        // Marca el tiempo final
        $endTime = microtime(true);

        // Calculo que muestra el tiempo total de ejecución
        $executionTime = $endTime - $startTime;
        echo "El seeder tomó: " . round($executionTime, 2) . " segundos.\n";
    }
}
