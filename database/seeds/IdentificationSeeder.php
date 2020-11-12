<?php

use App\Identification;
use Illuminate\Database\Seeder;

class IdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'DNI',
                'operation' => 'Persona',
            ],
            [
                'name' => 'RUC',
                'operation' => 'Persona'
            ],
            [
                'name' => 'NIC',
                'operation' => 'Persona'
            ],
            [
                'name' => 'CEDULA',
                'operation' => 'Persona'
            ],
            [
                'name' => 'TICKET',
                'operation' => 'Comprobante'
            ],
            [
                'name' => 'FACTURA',
                'operation' => 'Comprobante'
            ],
            [
                'name' => 'BOLETA',
                'operation' => 'Comprobante'
            ],
            [
                'name' => 'GUIA-REMISION',
                'operation' => 'Comprobante'
            ],

        ];
        foreach ($data as $key) {
            Identification::create($key);
        }
    }
}
