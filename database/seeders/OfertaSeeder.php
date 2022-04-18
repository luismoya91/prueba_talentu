<?php

namespace Database\Seeders;

use App\Models\Oferta;
use Illuminate\Database\Seeder;
use Faker\Factory;
class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            $faker = Factory::create();
            Oferta::insert(
                [
                'nombre' => $faker->sentence(),
                'candidatos' => serialize([
                    ['id' => $i+1],
                    ['id' => $i+2],
                ]),
                'estado' => 'Activo'
                ]
            );
        }
    }
}
