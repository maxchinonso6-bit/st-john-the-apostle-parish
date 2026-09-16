<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Reflection;
use App\Models\SchoolActivity;

/**
 * TEMPORARY debug controller used to verify that data uploaded via
 * Filament still exists in the database. Remove this controller
 * (and its route in routes/web.php) once troubleshooting is complete.
 */
class DebugController extends Controller
{
    public function checkDatabase()
    {
        return response()->json([
            'buildings' => Building::count(),
            'reflections' => Reflection::count(),
            'school_activities' => SchoolActivity::count(),
        ]);
    }
}
