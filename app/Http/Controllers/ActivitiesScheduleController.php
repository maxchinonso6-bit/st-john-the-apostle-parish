<?php

namespace App\Http\Controllers;

use App\Models\ActivitiesSchedule;

class ActivitiesScheduleController extends Controller
{
    public function index()
    {
        $schedules = ActivitiesSchedule::orderBy('category')->orderBy('order')->get()->groupBy('category');
        return view('mass-schedule', compact('schedules'));
    }
}