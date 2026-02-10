<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Models\GoldTable;
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
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Invalid input.'], 400);
        }

        $goldRate = GoldTable::find($request->id);
        $goldRate->additional_value = $request->additional_value;
        $goldRate->new_value = round($goldRate->new_value + $request->additional_value, 2);
        $goldRate->save();

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
        $apiKey = "goldapi-42848smlg8c8xg-io";
        $symbol = "XAU";
        $curr = "USD";
        $date = "/20260210";

        $myHeaders = array(
            'x-access-token: ' . $apiKey,
            'Content-Type: application/json'
        );

        $curl = curl_init();

        $url = "https://www.goldapi.io/api/{$symbol}/{$curr}{$date}";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER => $myHeaders
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

    }
}
