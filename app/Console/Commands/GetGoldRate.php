<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GoldTable;
use App\Models\RateTable;
use App\Models\DailyRate;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Http;

class GetGoldRate extends Command
{
    protected $signature = 'getgoldrate:cron';

    public function handle()
    {
        $response = Http::get('https://metals-api.com/api/latest', [
            'access_key' => 'w83gkfza91725ug8t597wvrsqh3z7xatd4udl6i6m8n4n2kajhr9mupmlolb',
            'base' => 'USD',
            'symbols' => 'XAU,MYR'
        ]);

        if (!$response->successful()) {
            $this->error('Metals-API request failed');
            return;
        }

        $data = $response->json();

        $usdToMyr = $data['rates']['MYR'];
        $usdToXau = $data['rates']['XAU'];

        $xauToUsd = 1 / $usdToXau;

        $savetoTable = RateTable::create([
            'datetime'=>Carbon::now(),
            'usdtomyr'=>$usdToMyr,
            'xautousd'=>$xauToUsd
        ]);
        
        $allGold = GoldTable::all();
        foreach($allGold as $gold){
            switch ($gold->type) {
                case "datetime":
                    $value = Carbon::now();
                    $additional_value = null;
                    $new_value = Carbon::now();
                    break;

                case 'usd':
                    $value = $usdToMyr;
                    $additional_value = $gold->additional_value;
                    $new_value = round($value+$additional_value,4);
                    break;

                case 'pamp':
                case 'goldbar':
                case 'gold999':
                case 'gold950':    
                case 'gold916':    
                case 'gold835':    
                case 'gold750':    
                case 'gold585':    
                case 'gold375':    
                    $getUsd = GoldTable::where('type','usd')->first();
                    $value = round($xauToUsd/31.1035*$getUsd->new_value*$gold->purities/1000,2);
                    $additional_value = $gold->additional_value;
                    $new_value = round($value+$additional_value,2);


                    DailyRate::where('type',$gold->type)->delete();
                    switch ($gold->type) {
                        case 'pamp':
                        case 'goldbar':
                        case 'gold999':
                        case 'gold950':    
                        case 'gold916':    
                        case 'gold835':    
                        case 'gold750':    
                        case 'gold585':    
                        case 'gold375':    
                            $startTime = Carbon::now();
                            $endTime   = $startTime->copy()->addMinutes(30);

                            $gold_value = $new_value;
                            $different_value = $gold_value - 1;

                            $currentPrice = $gold_value;
                            $currentTime = $startTime->copy();
                            $records=[];
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
                                    'type' => $gold->type,
                                    'rate' => $currentPrice,
                                ];
                            }
                            DB::table('daily_rates')->insert($records);

                            break;

                        default:
                        break;
                    }
                    break;

                default:
                break;
            }
            $gold->update([
                'value'=>$value,
                'new_value'=>$new_value,
            ]);
        }
    }
}
