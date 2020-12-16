<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Identifier;

class IdentifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($a = 1; $a<4; $a++ )
        for($i = 0; $i<100; $i++){
            Identifier::create([
                'id' => bin2hex(openssl_random_pseudo_bytes(20)),
                'location_id' => $a
            ]);
        }
    }
}
