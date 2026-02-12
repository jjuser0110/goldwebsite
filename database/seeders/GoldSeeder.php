<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GoldTable;

class GoldSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        GoldTable::truncate();
        $data = [
            [
                'type'=>'datetime',
                'value'=>'2026-02-05 12:50:57',
                'purities'=>null,
                'additional_value'=>null,
                'new_value'=>'2026-02-05 12:50:57',
            ],
            [
                'type'=>'usd',
                'value'=>4.005,
                'purities'=>null,
                'additional_value'=>0,
                'new_value'=>4.005,
            ],
            [
                'type'=>'pamp',
                'value'=>600.00,
                'purities'=>999.9,
                'additional_value'=>0,
                'new_value'=>600.00,
            ],
            [
                'type'=>'goldbar',
                'value'=>595.00,
                'purities'=>995,
                'additional_value'=>0,
                'new_value'=>595.00,
            ],
            [
                'type'=>'gold999',
                'value'=>580.00,
                'purities'=>995,
                'additional_value'=>0,
                'new_value'=>580.00,
            ],
            [
                'type'=>'gold950',
                'value'=>580.00,
                'purities'=>950,
                'additional_value'=>0,
                'new_value'=>580.00,
            ],
            [
                'type'=>'gold916',
                'value'=>535.00,
                'purities'=>916,
                'additional_value'=>0,
                'new_value'=>535.00,
            ],
            [
                'type'=>'gold835',
                'value'=>535.00,
                'purities'=>835,
                'additional_value'=>0,
                'new_value'=>535.00,
            ],
            [
                'type'=>'gold750',
                'value'=>440.00,
                'purities'=>750,
                'additional_value'=>0,
                'new_value'=>440.00,
            ],
            [
                'type'=>'gold585',
                'value'=>440.00,
                'purities'=>585,
                'additional_value'=>0,
                'new_value'=>440.00,
            ],
            [
                'type'=>'gold375',
                'value'=>440.00,
                'purities'=>375,
                'additional_value'=>0,
                'new_value'=>440.00,
            ],
        ];
        GoldTable::insert($data);
    }
}
