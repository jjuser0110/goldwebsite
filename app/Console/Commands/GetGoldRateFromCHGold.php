<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GoldTable;
use App\Models\RateTable;
use App\Models\DailyRate;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Http;

class GetGoldRateFromCHGold extends Command
{   
    protected $signature = 'getgoldratefromchgold:cron';

    public function handle()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ZDc3ZDAwNzAwYmM3OTM5MmY2OGZhMWI3YTc3MDVhZjY1MjIwNzEwZTIwYTQ1NzIyNTExZjZkYzBjMjY4MzkxNzpZMmhuYjJ4a1gyRmtiV2x1T21Ob1oyOXNaRjl3WVhOemQyOXlaQT09'
        ])->get(
            'https://api-srs.chgold.com.my/goldPrice/chGetGoldPrices',
            [
                'symbolArr' => [
                    '999.9',
                    '999',
                    '965',
                    '916',
                    '835',
                    '750',
                    '585',
                    '375',
                    'qian_jin'
                ]
            ]
        );

        $data = $response->json();

        if (!isset($data['data'])) {
            return;
        }

        $map = [
            '999'   => ['pamp', 'goldbar','gold999','gold950','gold916','gold835','gold750','gold585','gold375','type1','type2','type3'],
            // '965'   => ['gold950'],
            // '916'   => ['gold916'],
            // '835'   => ['gold835'],
            // '750'   => ['gold750'],
            // '585'   => ['gold585'],
            // '375'   => ['gold375']
        ];

        foreach ($data['data'] as $d) {

            $purity = $d['purity'] ?? null;
            $buyPrice = $d['buyPrice'] ?? null;

            if (!$purity || !$buyPrice) {
                continue;
            }

            if (!isset($map[$purity])) {
                continue;
            }

            foreach ($map[$purity] as $type) {
                $this->updateGoldRate($type, $buyPrice);
            }
        }
        
        $datetime = GoldTable::where('type', 'datetime')->first();
        if(isset($datetime)){
            $datetime->update([
                'value' => Carbon::now(),
                'new_value' => Carbon::now(),
            ]);
        }
    }

    private function updateGoldRate($type, $buyPrice)
    {
        $gold = GoldTable::where('type', $type)->first();

        if (!$gold) {
            return;
        }

        $value = round($buyPrice, 2);

        $additional_value = $gold->additional_value;
        $water_level = $gold->water_level;

        $new_value = round(($value + $additional_value) * $water_level, 2);

        $gold->update([
            'value' => $value,
            'new_value' => $new_value,
        ]);
        DailyRate::where('type', $type)->forceDelete();

        $startTime = Carbon::now();
        $endTime = $startTime->copy()->addMinutes(2);

        $gold_value = $new_value;
        $different_value = $gold_value - 1;

        $currentPrice = $gold_value;
        $currentTime = $startTime->copy();

        $records = [];

        while ($currentTime->lt($endTime)) {

            $interval = collect([5, 10])->random();
            $currentTime->addSeconds($interval);

            if ($currentTime->gt($endTime)) {
                break;
            }

            $change = rand(-20, 20) / 100;
            $newPrice = $currentPrice + $change;

            $newPrice = min($gold_value, max($different_value, $newPrice));
            $currentPrice = round($newPrice, 2);

            $records[] = [
                'datetime' => $currentTime->copy(),
                'type' => $type,
                'rate' => $currentPrice,
            ];
        }

        if (!empty($records)) {
            DB::table('daily_rates')->insert($records);
        }
    }
}
