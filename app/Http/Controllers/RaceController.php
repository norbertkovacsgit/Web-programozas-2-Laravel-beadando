<?php

namespace App\Http\Controllers;

use App\Models\Result;

class RaceController extends Controller
{
    public function index()
    {
        $allowedSizes = [5, 10, 25, 50, 100, 200];
        $perPage = (int) request('size', 10);
        if (!in_array($perPage, $allowedSizes)) {
            $perPage = 10;
        }

        $results = Result::query()
            ->join('pilots', 'results.pilot_id', '=', 'pilots.id')
            ->leftJoin('grand_prix', 'results.date', '=', 'grand_prix.date')
            ->select([
                'grand_prix.date as gp_date',
                'grand_prix.name as gp_name',
                'grand_prix.location as gp_location',

                'pilots.name as pilot_name',
                'pilots.gender as pilot_gender',
                'pilots.nationality as pilot_nationality',

                'results.pilot_id',
                'results.position',
                'results.team',
                'results.car_type',
                'results.engine',
                'results.date as result_date',
                'results.failure as error_status',
            ])
            ->orderBy('results.date', 'desc')
            ->paginate($perPage)
            ->withQueryString();

        return view('races.index', compact('results'));
    }
}
