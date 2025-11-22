<?php

namespace App\Http\Controllers;

use App\Models\Result;

class DiagramController extends Controller
{
    public function index()
    {
        $teamTotals = Result::query()
            ->selectRaw('team, COUNT(*) as total')
            ->whereNotNull('team')
            ->where('team', '!=', '')
            ->groupBy('team')
            ->get()
            ->pluck('total', 'team');

        $topTeams = $teamTotals->sortDesc()->take(20);

        $otherSum = $teamTotals->sum() - $topTeams->sum();

        $sortedTop = $topTeams->sortKeys();

        $labels = $sortedTop->keys()->values()->all();
        $data   = $sortedTop->values()->values()->all();

        if ($otherSum > 0) {
            $labels[] = 'Egyebek';
            $data[]   = $otherSum;
        }

        return view('diagram.index', compact('labels', 'data'));
    }
}
