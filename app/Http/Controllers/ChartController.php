<?php

namespace App\Http\Controllers;

use App\Models\Finalis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class ChartController extends Controller
{
    public function index()
    {
        $currentYear = Carbon::now()->year;
        $finalis = Finalis::where('tahun', $currentYear)->orderBy('votings', 'desc')->get();

        $sum = Finalis::where('tahun', $currentYear)->sum('votings');
        // $finalis = Finalis::all()->sortByDesc('votings');
        // $finalis = json_encode($finalis, true);
        // $finalis = $finalis->votings;
        // dd($finalis);
        // $finalisvote = $finalis['votings'];

        return view('chart', [
            'finalis' => $finalis
        ], compact('sum'));
    }
}
