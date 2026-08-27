<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {
        $officeEmail = Setting::where('key', 'parish_office_email')->value('value');
        $parishAddress = Setting::where('key', 'parish_address')->value('value');
        $officePhone = Setting::where('key', 'office_phone')->value('value');
        $officeHours = Setting::where('key', 'office_hours')->value('value');
        $mapQuery = Setting::where('key', 'map_query')->value('value')
            ?? $parishAddress
            ?? 'St John the Apostle Parish, Isiakpu Nsukka';
        return view('contact', compact('officeEmail', 'parishAddress', 'officePhone', 'officeHours', 'mapQuery'));
    }
}