<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Models\GoldTable;
use App\Models\RateTable;
use App\Models\Setting;
use App\Models\DailyRate;
use Bouncer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class WelcomeController extends Controller
{
    // public function welcome(Request $request)
    // {
    //     $now_date = Carbon::now()->format('j F Y');
    //     $now_time = Carbon::now()->format('H:i:s');
    //     return view('welcome')->with('now_date',$now_date)->with('now_time',$now_time);
    // }
    public function welcome(Request $request)
    {
        $now_date = Carbon::now()->format('j F Y');
        $now_time = Carbon::now()->format('H:i:s');

        $goldRates = GoldTable::where('type', '!=', 'datetime')->get();

        $setting = Setting::where('type', 'working')->first();

        return view('welcome', compact('now_date', 'now_time', 'goldRates','setting'));
    }

    // public function getPrices(Request $request)
    // {
    //     $goldRates = GoldTable::where('type', '!=', 'datetime')->get();

    //     $data = [];
    //     $name = [];

    //     foreach ($goldRates as $row) {
    //         $data[$row->type] = $row->new_value ?? 0.00;
    //         $name[$row->type] = $row->show_name ?? $row->type;
    //     }

    //     return response()->json([
    //         'status' => true,
    //         'now_date' => now()->format('j F Y'),
    //         'now_time' => now()->format('H:i:s'),
    //         'data' => $data,
    //         'name' => $name,
    //     ]);
    // }
    
    public function getPrices(Request $request)
    {
        $goldTypes = [
            'pamp','goldbar','gold999','gold950',
            'gold916','gold835','gold750',
            'gold585','gold375',
            'type1','type2','type3','type4','type5'
        ];
    
        $data = [];
        $name = [];
    
        $working = 1;
    
        $checkSetting = Setting::where('type', 'working')->first();
    
        if (!$checkSetting || $checkSetting->value != 1) {
            $working = 0;
        }
    
        // CHECK AUTO REFRESH STATUS
        $autoRefresh = $request->autoRefresh ?? "1";
    
        foreach ($goldTypes as $type) {
    
            $goldTable = GoldTable::where('type', $type)->first();
    
            $goldrate = $goldTable->new_value ?? 0.00;
    
            $name[$type] = $goldTable->show_name ?? $type;
    
            // OFF WORK
            if ($working == 0) {
    
                $data[$type] = "Off Work";
    
            } else {
    
                // =========================
                // STOP REFRESH MODE
                // =========================
                if ($autoRefresh == "0") {
    
                    // ALWAYS USE GOLD TABLE VALUE
                    $data[$type] = $goldrate;
    
                } else {
    
                    // LIVE MODE
                    $start = Carbon::now()->subSeconds(5);
                    $end   = Carbon::now();
    
                    $latest = DB::table('daily_rates')
                        ->where('type', $type)
                        ->whereBetween('datetime', [$start, $end])
                        ->orderBy('datetime', 'desc')
                        ->whereNull('deleted_at')
                        ->first();
    
                    $data[$type] = $latest
                        ? $latest->rate
                        : $goldrate;
                }
            }
        }
    
        return response()->json([
            'status' => true,
            'now_date' => Carbon::now()->format('j F Y'),
            'now_time' => Carbon::now()->format('H:i:s'),
            'data' => $data,
            'name' => $name,
        ]);
    }

    
}
