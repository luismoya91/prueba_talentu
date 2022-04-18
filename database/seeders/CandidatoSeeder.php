<?php

namespace Database\Seeders;

use App\Models\Candidato;
use Illuminate\Database\Seeder;
use Faker\Factory;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $faker = Factory::create();
            Candidato::insert(
                [
                'nombre' => $faker->name,
                'correo' => $faker->unique()->safeEmail,
                'tipo_documento' => 'CC',
                'numero_documento' => $faker->randomNumber(8,false)
                ]
            );
        }
    }
}
