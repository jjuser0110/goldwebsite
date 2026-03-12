<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Models\GoldTable;
use App\Models\RateTable;
use App\Models\DailyRate;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
use Bouncer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $goldRates = GoldTable::all();
        return view('gold_table.index', compact('goldRates'));
    }

    public function update_additional_value(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'exists:gold_tables,id'],
            'additional_value' => ['nullable', 'numeric'],
            'water_level' => ['nullable', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Invalid input.'], 400);
        }

        $goldRate = GoldTable::find($request->id);
        $additional_value = $request->additional_value;
        $water_level = $request->water_level;
        if($goldRate->type == 'usd'){
            $new_value = round($goldRate->value+$additional_value,4);
        }else{
            $new_value = round(($goldRate->value + $additional_value) * $water_level, 2);
        }
        $goldRate->update(['additional_value'=>$additional_value,'water_level'=>$water_level,'new_value'=>$new_value]);

        
        DailyRate::where('type',$goldRate->type)->delete();
        switch ($goldRate->type) {
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

                $gold_value = $goldRate->new_value;
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
                        'type' => $goldRate->type,
                        'rate' => $currentPrice,
                    ];
                }
                DB::table('daily_rates')->insert($records);

                break;

            default:
            break;
        }

        return response()->json(['status' => 'success', 'message' => 'Additional value updated successfully.', 'new_value' => $goldRate->new_value]);
    }

    public function change_password(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if ($validator->fails()) {
            $message = "";
            foreach($validator->messages()->messages() as $m){
                foreach($m as $mm){
                    $message .=$mm.'\n';
                }
            }
            return redirect()->back()->withInfo($message);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('home')->withSuccess('Password changed successfully.');
    }

    public function test(Request $request){
        
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

        foreach($data['data'] as $d){
            $purity = $d['purity'];
            $buyPrice = $d['buyPrice'];

            dump($purity, $buyPrice,'-----------------');

        }
        dd($data);
    }

    public function test2(Request $request){
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
                    $startTime = Carbon::now();
                    $endTime   = $startTime->copy()->addMinutes(30);

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
