<?php

namespace App\Http\Controllers;

use App\Models\SchoolActivity;
use App\Models\EnrollmentInquiry;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $activities = SchoolActivity::orderByDesc('date')->get();
        return view('school', compact('activities'));
    }

    public function storeInquiry(Request $request)
    {
        $validated = $request->validate([
            'guardian_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'child_class' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        $validated['status'] = 'new';
        EnrollmentInquiry::create($validated);

        return back()->with('success', 'Thank you! We\'ll reach out to you shortly about enrollment.');
    }
}