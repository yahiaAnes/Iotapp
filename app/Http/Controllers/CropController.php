<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;
// use App\Models\AdminReview; // طبعًا يجب إنشاء هذا الموديل أو ما يناسبه

// public function sendToAdmin(Request $request)
// {
//     $cropIds = $request->input('crop_ids', []);

//     foreach ($cropIds as $cropId) {
//         AdminReview::create([
//             'crop_id' => $cropId,
//             'status' => 'pending',
//             'submitted_by' => auth()->id(), // المستخدم الذي أرسل البيانات
//         ]);
//     }

//     return response()->json(['message' => 'تم الإرسال بنجاح']);
// }

class CropController extends Controller
{
    public function show($id)
    {
        return view('crop.show', compact('id'));
    }
}

