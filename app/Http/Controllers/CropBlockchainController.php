<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;
class CropBlockchainController extends Controller
{
    

public function index(Request $request)
{
    $status = $request->input('status');

    $crops = Crop::with('farm')
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->get();

    return view('filament.pages.save-in-blockchain-page', compact('crops'));
}


public function sendToAdmin(Request $request)
{
    $cropId = $request->input('crop_id');
    $crop = Crop::findOrFail($cropId);

    $crop->status = 'pending'; // تأكد أن لديك عمود status في جدول crops
    $crop->save();

    return response()->json(['message' => 'تم إرسال المحصول للمراجعة']);
}

    // public function index()
    // {
    //     $cropsToRevieFw = Crop::with('farm')->where('status', 'pending')->get();

    //     return view('filament.pages.save-in-blockchain-page', [
    //         'crops' => $cropsToReview
    //     ]);
    // }
    public function markStored(Crop $crop)
{
    $crop->update(['status' => 'stored']);
    return response()->json(['ok' => true]);
}

//     public function markStored(Crop $crops){
//     $crop->update(['status'=>'stored']);
//     return response()->json(['ok'=>true]);
// }
}
