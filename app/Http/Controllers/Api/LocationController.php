<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentLocation;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index() {
        $locations = StudentLocation::with('student')->get();
        return response()->json(compact('locations'));
    }

}
