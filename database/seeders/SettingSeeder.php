<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        $data = [
            [
                'type'=>'working',
                'value'=>1,
            ],
        ];
        Setting::insert($data);
    }
}
