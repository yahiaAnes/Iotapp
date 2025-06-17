<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorReadings;
use App\Models\Sensors;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'sensor_id' => 'required|exists:sensors,id',
            'value' => 'required|numeric',
            'unit' => 'required|string',
            'timestamp' => 'required|date',
        ]);

        SensorReadings::create([
            'sensor_id' => $request->sensor_id,
            'value' => $request->value,
            'unit' => $request->unit,
            'timestamp' => $request->timestamp,
        ]);

        return response()->json(['message' => 'Sensor reading saved successfully'], 201);
    }
}
