<?php

namespace App\Http\Controllers;

use App\Models\Reflection;
use App\Models\ActivitiesSchedule;
use App\Models\Clergy;
use App\Models\Activity;
use App\Models\SchoolActivity;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $latestReflection = Reflection::latest('published_at')->first();
        $massSchedules = ActivitiesSchedule::where('category', 'Sunday Mass')->orderBy('order')->get();
        $activeClergy = Clergy::where('status', 'active')->take(4)->get();
        $upcomingActivity = Activity::whereDate('date', '>=', now())->orderBy('date')->first();

        $parishActivities = Activity::with('organisation')
            ->orderByDesc('date')
            ->take(3)
            ->get();

        $schoolActivities = SchoolActivity::orderByDesc('date')
            ->take(3)
            ->get();

        $welcomeMessage = Setting::where('key', 'welcome_message')->value('value')
            ?? "At St John the Apostle Parish, Isiakpu Nsukka, you'll find a loving community that nurtures your spiritual journey — become part of our family.";
        $parishMotto = Setting::where('key', 'parish_motto')->value('value')
            ?? 'St John, One Family...';
        $mapQuery = \App\Models\Setting::where('key', 'map_query')->value('value')
            ?? \App\Models\Setting::where('key', 'parish_address')->value('value')
            ?? 'St John the Apostle Parish, Isiakpu Nsukka';
        return view('home', compact(
            'latestReflection',
            'massSchedules',
            'activeClergy',
            'upcomingActivity',
            'parishActivities',
            'schoolActivities',
            'welcomeMessage',
            'parishMotto',
            'mapQuery'
        ));
    }
}