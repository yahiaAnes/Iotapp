<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    public function storeFarm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'size' => 'required|numeric',
            'total_crops' => 'required|integer',
            'total_sensors' => 'required|integer',
        ]);

        // الخطوة التي تحفظ البيانات في البلوكشاين
        // مثال وهمي: نفترض أن لديك خدمة BlockchainService
        try {
            // BlockchainService::saveFarm($data);
            // يمكنك استبداله بكتابة العقد الذكي أو نداء إلى API البلوكشاين
            return response()->json(['message' => 'Farm saved to blockchain successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Blockchain error: ' . $e->getMessage()], 500);
        }
    }
    public function markFarmStored($farmId)
{
    // مثال: تحديث حالة المزرعة في قاعدة البيانات إلى "stored_on_blockchain"
    $farm = \App\Models\Farm::find($farmId);

    if (!$farm) {
        return response()->json(['message' => 'Farm not found.'], 404);
    }

    $farm->status = 'stored_on_blockchain';
    $farm->save();

    return response()->json(['message' => 'Farm marked as stored on blockchain.']);
}

}
