<?php

namespace App\Http\Controllers;

use App\Models\Clergy;
use App\Models\ParishCouncilExecutive;
use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        $activeClergy = Clergy::where('status', 'active')->get();
        $pastClergy = Clergy::where('status', 'past')->orderByDesc('end_year')->get();
        $council = ParishCouncilExecutive::where('status', 'active')->orderBy('order')->get();

        $parishHistory = Setting::where('key', 'parish_history')->value('value')
            ?? 'Parish history has not been added yet. Add it from Parish Settings in the admin dashboard.';

        return view('about', compact('activeClergy', 'pastClergy', 'council', 'parishHistory'));
    }
}