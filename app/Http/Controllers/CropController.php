<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;


class CropController extends Controller
{
    public function show($id)
    {
        return view('crop.show', compact('id'));
    }
}

