<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;

class CropBlockchainController extends Controller
{
    // إرسال محصول من المستخدم إلى الأدمن (تغيير الحالة إلى pending)

    
    public function sendToAdmin(Request $request)
    {
        $cropId = $request->input('crop_id');
        if (!$cropId) {
            return response()->json(['success' => false, 'message' => 'Missing crop_id'], 400);
        }

        $crop = Crops::find($cropId);
        if (!$crop) {
            return response()->json(['success' => false, 'message' => 'Crop not found'], 404);
        }

        $crop->idadmin = 1;
        $crop->user_id = auth()->id();
        $crop->status = 'pending';
        
        $crop->save();

        return response()->json(['success' => true]);
    }



    // عرض المحاصيل (للإدارة) حسب الحالة (pending, stored, ...)
   public function index(Request $request)
{
    $status = $request->input('status');

    $crops = Crop::with('farm','user')
        ->whereNotNull('idadmin')
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->get();

    $farms = Farm::all();

    return view('filament.pages.save-in-blockchain-page', compact('crops', 'farms'));
}

    // تغيير حالة المحصول إلى stored (بعد الحفظ في البلوكشين)
    public function markStored($id)
    {
        $crop = Crop::find($id);
        if (!$crop) {
            return response()->json(['success' => false, 'message' => 'Crop not found'], 404);
        }

        $crop->status = 'stored';
        $crop->save();

        return response()->json(['success' => true]);
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Crop;
// class CropBlockchainController extends Controller
// {
    
// public function sendToAdmin(Request $request)
// {
//     $cropId = $request->input('crop_id');
//     if (!$cropId) {
//         return response()->json(['success' => false, 'message' => 'Missing crop_id'], 400);
//     }

//     $crop = Crop::find($cropId);
//     if (!$crop) {
//         return response()->json(['success' => false, 'message' => 'Crop not found'], 404);
//     }

//     $crop->status = 'pending';
//     $crop->save();

//     return response()->json(['success' => true]);
// }


//    public function saveInBlockchainPage(Request $request)
// {
//     $status = $request->input('status');
//     $query = Crop::query();
//     if ($status) {
//         $query->where('status', $status);
//     }
//     $crops = $query->with('farm')->get();

//     return view('filament.pages.save-in-blockchain-page', compact('crops'));
// }

// public function render()
// {
//     $query = Crops::with('farm');

//     if (request()->has('status') && request('status') !== '') {
//         $query->where('status', request('status'));
//     }

//     $crops = $query->get();

//     return view('filament.pages.save-in-blockchain-page', [
//         'crops' => $crops
//     ]);
// }
// public function index(Request $request)
// {
//     $status = $request->input('status');

//     $crops = Crop::with('farm')
//         ->when($status, function ($query, $status) {
//             return $query->where('status', $status);
//         })
//         ->get();

//     return view('filament.pages.save-in-blockchain-page', compact('crops'));
// }


// // public function sendToAdmin(Request $request)
// // {
// //     $cropId = $request->input('crop_id');
// //     $crop = Crop::findOrFail($cropId);

// //     $crop->status = 'pending'; // تأكد أن لديك عمود status في جدول crops
// //     $crop->save();

// //     return response()->json(['message' => 'تم إرسال المحصول للمراجعة']);


//     // public function index()
//     // {
//     //     $cropsToRevieFw = Crop::with('farm')->where('status', 'pending')->get();

//     //     return view('filament.pages.save-in-blockchain-page', [
//     //         'crops' => $cropsToReview
//     //     ]);
//     // }
//   public function markStored($id)
// {
//     $crop = Crop::find($id);
//     if ($crop) {
//         $crop->status = 'stored';
//         $crop->save();
//         return response()->json(['success' => true]);
//     }

//     return response()->json(['success' => false], 404);
// }


// //     public function markStored(Crop $crops){
// //     $crop->update(['status'=>'stored']);
// //     return response()->json(['ok'=>true]);
// // }
