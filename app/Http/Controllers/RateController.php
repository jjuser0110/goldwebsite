<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use App\Models\RateTable;
use App\Models\GoldTable;
use Bouncer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function index(Request $request)
    {
        $rate = RateTable::orderBy('datetime', 'desc')->get();

        return view('rate.index')->with('rate',$rate);
    }

    public function goldIndex()
    {
        $goldRates = GoldTable::get();
        return view('gold_table.index', compact('goldRates'));
    }

    public function goldCreate()
    {
        return view('gold_table.create');
    }

    public function goldEdit($id)
    {
        $gold = GoldTable::findOrFail($id);
        return view('gold_table.create', compact('gold'));
    }

    // STORE
    public function goldStore(Request $request)
    {
        $request->validate([
            'type' => 'required|unique:gold_tables,type',
            'value' => 'required|numeric'
        ]);

        $newValue = ($request->value - ($request->water_level ?? 0))
                    + ($request->additional_value ?? 0);

        GoldTable::create([
            'type' => $request->type,
            'show_name' => $request->show_name ?? $request->type,
            'value' => $request->value,
            'water_level' => $request->water_level ?? 0,
            'additional_value' => $request->additional_value ?? 0,
            'new_value' => $newValue,
        ]);

        return redirect()->route('gold.index')->with('success','Created');
    }

    // UPDATE
    public function goldUpdate(Request $request, $id)
    {
        $gold = GoldTable::findOrFail($id);

        $newValue = ($request->value - ($request->water_level ?? 0))
                    + ($request->additional_value ?? 0);

        $gold->update([
            'show_name' => $request->show_name,
            'value' => $request->value,
            'water_level' => $request->water_level ?? 0,
            'additional_value' => $request->additional_value ?? 0,
            'new_value' => $newValue,
        ]);

        DailyRate::where('type', $gold->type)->forceDelete();

        $startTime = Carbon::now();
        $endTime = $startTime->copy()->addMinutes(20);

        $gold_value = $newValue;
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



        return redirect()->route('gold.index')->with('success','Updated');
    }

}
