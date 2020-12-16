<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Establishment;
class EstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Establishment::create([
            'id' => 950,
            'name' => 'Direccion Servicio',
            'address' => 'Arturo Prat 969'
        ]);

        Establishment::create([
            'id' => 953,
            'name' => 'Hospital Hernan Henriquez Aravena',
            'address' => 'Arturo Prat 969'
        ]);

        Establishment::create([
            'id' => 960,
            'name' => 'Complejo Asistencia Padre las Casas',
            'address' => 'Arturo Prat 969'
        ]);

        Establishment::create([
            'id' => 968,
            'name' => 'Hospital de Galvarino',
            'address' => 'Arturo Prat 969'
        ]);

        Establishment::create([
            'id' => 971,
            'name' => 'Hospital de Tolten',
            'address' => 'Arturo Prat 969'
        ]);
    }
}
