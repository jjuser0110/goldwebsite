<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GoldTable;
use App\Models\RateTable;
use App\Models\DailyRate;
use Carbon\Carbon;
use DB;

class AddRate extends Command
{
    protected $signature = 'addrate:cron';

    public function handle()
    {
        DailyRate::truncate();
        $allGold = GoldTable::all();
        $records=[];
        foreach($allGold as $gold){
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
                case 'type1':    
                case 'type2':    
                case 'type3':    
                case 'type4':    
                case 'type5':   
                    $startTime = Carbon::now();
                    $endTime   = $startTime->copy()->addMinutes(20);

                    $gold_value = $gold->new_value;
                    $different_value = $gold_value - 1;

                    $currentPrice = $gold_value;
                    $currentTime = $startTime->copy();

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

                    break;

                default:
                break;
            }
        }
        DB::table('daily_rates')->insert($records);
    }
}
