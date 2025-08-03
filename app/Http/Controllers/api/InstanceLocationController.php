<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\InstanceLocation;
use Illuminate\Http\Request;

class InstanceLocationController extends Controller
{
    public function getDefaultLocation()
    {
        $location = InstanceLocation::where('name', 'Default Location')->first();
        if ($location) {
            return response()->json($location);
        }

        return response()->json(['message' => 'No default location found'], 404);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_location = InstanceLocation::all();
        if ($list_location->isEmpty()) {
            return response()->json(['message' => 'No locations found'], 404);
        }

        return response()->json($list_location);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
