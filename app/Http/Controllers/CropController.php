<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;

class CropController extends Controller
{
    // استقبال IDs المحاصيل من المستخدم وتخزينها في الجلسة
    public function receiveCropsFromUser(Request $request)
    {
        $cropIds = $request->input('crop_ids', []);
        // جلب بيانات المحاصيل من DB بناءً على IDs
        $crops = Crop::whereIn('id', $cropIds)->get();

        // تخزين البيانات في الجلسة
        session(['pending_crops_for_admin' => $crops]);

        return response()->json(['status' => 'success', 'message' => 'Data sent to admin successfully']);
    }

    // عرض بيانات المحاصيل المخزنة في الجلسة على صفحة الأدمن
    public function showCropsForAdmin()
    {
        $crops = session('pending_crops_for_admin', collect());

        return view('admin.crops-review', compact('crops'));
    }

    // إجراء رفع البيانات إلى البلوكشاين (مثال فقط)
    public function uploadCropsToBlockchain(Request $request)
    {
        $crops = session('pending_crops_for_admin', collect());

        // هنا تضيف الكود الخاص برفع البيانات إلى البلوكشاين

        // بعد الرفع مثلاً تم مسح الجلسة
        session()->forget('pending_crops_for_admin');

        return redirect()->route('admin.cropsReview')->with('success', 'Crops uploaded to blockchain successfully.');
    }


    // public function show($id)
    // {
    //     return view('crop.show', compact('id'));
    // }
}

