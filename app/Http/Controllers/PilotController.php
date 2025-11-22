<?php

namespace App\Http\Controllers;

use App\Models\Pilot;
use Illuminate\Http\Request;

class PilotController extends Controller
{
    public function index()
    {
        $allowedSizes = [5, 10, 25, 50, 100, 200];
        $perPage = (int) request('size', 10);
        if (!in_array($perPage, $allowedSizes)) {
            $perPage = 10;
        }

        $pilots = Pilot::orderByDesc('created_at')
            ->orderBy('name')
            ->paginate($perPage)
            ->withQueryString();


        $editingId = request('edit');

        return view('pilots.index', compact('pilots', 'editingId'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'gender'      => 'nullable|string|max:1',
            'birth_date'  => 'nullable|date',
            'nationality' => 'nullable|string|max:255',
        ]);

        Pilot::create($data);

        return redirect()
            ->route('pilots.index', array_merge(
                request()->except('page'),
                ['page' => 1]
            ))
            ->with('success', 'Pilóta létrehozva.');
    }

    public function update(Request $request, Pilot $pilot)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'gender'      => 'nullable|string|max:1',
            'birth_date'  => 'nullable|date',
            'nationality' => 'nullable|string|max:255',
        ]);

        $pilot->update($data);

        return redirect()
            ->route('pilots.index', request()->except('edit'))
            ->with('success', 'Pilóta módosítva.');
    }

    public function destroy(Pilot $pilot)
    {
        $pilot->delete();

        return redirect()
            ->route('pilots.index')
            ->with('success', 'Pilóta törölve.');
    }
}
