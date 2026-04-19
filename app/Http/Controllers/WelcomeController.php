<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Models\GoldTable;
use App\Models\RateTable;
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

        return view('welcome', compact('now_date', 'now_time', 'goldRates'));
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
    
    public function getPrices(Request $request){
        $goldTypes = [
            'pamp','goldbar','gold999','gold950',
            'gold916','gold835','gold750','gold585','gold375','type1','type2','type3','type4','type5'
        ];

        $data = [];
        $name = [];

        foreach ($goldTypes as $type) {
            $goldrate = GoldTable::where('type',$type)->first()->new_value??0.00;

            $start = Carbon::now()->subSeconds(5);
            $end   = Carbon::now();
    
            $latest = DB::table('daily_rates')
                ->where('type', $type)
                ->whereBetween('datetime', [$start, $end])
                ->orderBy('datetime', 'desc') 
                ->whereNull('deleted_at')
                ->first();
                
            $data[$type] = $latest ? $latest->rate : $goldrate;
            $name[$type] = GoldTable::where('type',$type)->first()->show_name??$type;
        }
        $now_date = Carbon::now()->format('j F Y');
        $now_time = Carbon::now()->format('H:i:s');
        // dd($data);
        return response()->json([
            'status' => true,
            'now_date' => $now_date,
            'now_time' => $now_time,
            'data' => $data,
            'name' => $name,
        ]);
    }

    
}
