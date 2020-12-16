<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'id' => 1,
            'name' =>'Prat 969',
            'description' => 'Entrada Primer Piso',
            'lat' => -38.7431317,
            'lng' => -72.5936477,
            'establishment_id' => 950
        ]);

        Location::create([
            'id' => 2,
            'name' =>'Bello Informatica',
            'description' => 'Entrada Bello Informatica',
            'lat' => -38.7431317,
            'lng' => -72.5936477,
            'establishment_id' => 950
        ]);


        Location::create([
            'id' => 3,
            'name' =>'Bello 888 Abastecimiento',
            'description' => 'Entrada Abastecimeinto 888',
            'lat' => -38.7431317,
            'lng' => -72.5936477,
            'establishment_id' => 950
        ]);
    }
}
