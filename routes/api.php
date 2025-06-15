<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;

Route::post('/admin/mark-crop-stored/{id}', function ($id) {
    $crop = \App\Models\Crop::findOrFail($id);
    $crop->status = 'stored';
    $crop->save();

    return response()->json(['success' => true]);
});

Route::post('/test-sensor', [SensorDataController::class, 'store']);


