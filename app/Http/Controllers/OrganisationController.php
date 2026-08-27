<?php

namespace App\Http\Controllers;

use App\Models\Organisation;

class OrganisationController extends Controller
{
    public function activities()
    {
        $organisations = Organisation::where('type', 'activity')->orderBy('order')->with('activities')->get();
        return view('activities', compact('organisations'));
    }

    public function pious()
    {
        $organisations = Organisation::where('type', 'pious')->with('activities')->get();
        return view('pious', compact('organisations'));
    }

    public function show(Organisation $organisation)
    {
        $organisation->load('activities');
        return view('organisations.show', compact('organisation'));
    }
}