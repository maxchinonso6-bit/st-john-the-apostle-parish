<?php

namespace App\Http\Controllers;

use App\Models\MassSchedule;

class MassScheduleController extends Controller
{
    public function index()
    {
        $schedules = MassSchedule::all();
        return view('mass-schedule', compact('schedules'));
    }
}