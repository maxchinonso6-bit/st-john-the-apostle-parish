<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Zone;

class ZoneController extends Controller
{
    public function index()
    {
        $stations = Station::with('zones')->get();
        return view('zones', compact('stations'));
    }

    public function show(Zone $zone)
    {
        $zone->load(['executives' => fn($q) => $q->where('status', 'active'), 'station']);
        return view('zones.show', compact('zone'));
    }
}