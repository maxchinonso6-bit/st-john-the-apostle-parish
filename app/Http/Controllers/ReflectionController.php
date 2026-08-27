<?php

namespace App\Http\Controllers;

use App\Models\Reflection;

class ReflectionController extends Controller
{
    public function index()
    {
        $reflections = Reflection::orderByDesc('published_at')->get();
        return view('reflections', compact('reflections'));
    }
}