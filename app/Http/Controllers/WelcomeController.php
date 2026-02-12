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
    public function welcome(Request $request)
    {
        $now_date = Carbon::now()->format('j F Y');
        $now_time = Carbon::now()->format('H:i:s');
        return view('welcome')->with('now_date',$now_date)->with('now_time',$now_time);
    }
    
    public function getPrices(Request $request){
        $goldTypes = [
            'pamp','goldbar','gold999','gold950',
            'gold916','gold835','gold750','gold585','gold375'
        ];

        $data = [];

        foreach ($goldTypes as $type) {
            $goldrate = GoldTable::where('type',$type)->first()->new_value??0.00;

            $latest = DB::table('daily_rates')
                ->where('type', $type)
                ->where('datetime','>=',Carbon::now())
                ->where('datetime','<',Carbon::now())
                ->first();
            $data[$type] = $latest ? $latest->rate : $goldrate;
        }
        $now_date = Carbon::now()->format('j F Y');
        $now_time = Carbon::now()->format('H:i:s');

        return response()->json([
            'status' => true,
            'now_date' => $now_date,
            'now_time' => $now_time,
            'data' => $data
        ]);
    }

    
}
