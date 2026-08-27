<?php

namespace App\Http\Controllers;

use App\Models\Catechist;

class CatechistController extends Controller
{
    public function index()
    {
        $catechists = Catechist::where('status', 'active')->get();
        return view('catechists', compact('catechists'));
    }
}

