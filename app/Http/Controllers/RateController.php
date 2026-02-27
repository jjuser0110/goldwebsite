<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use App\Models\RateTable;
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

}
