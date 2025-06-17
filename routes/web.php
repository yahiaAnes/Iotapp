<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Crop;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CropBlockchainController;
use App\Filament\Pages\SaveInBlockchainPage;
use App\Http\Controllers\BlockchainController;


Route::post('/user/blockchain/send-to-blockchain', [BlockchainController::class, 'sendToBlockchain'])->name('blockchain.send')->middleware(['auth']);


Route::post('/admin/save-farm-to-blockchain', [BlockchainController::class, 'storeFarm']);
Route::middleware(['auth', 'can:isAdmin'])->post(
    '/admin/mark-farm-stored/{farmId}',
    [BlockchainController::class, 'markFarmStored']
)->name('mark.farm.stored');

// المستخدم يرسل المحصول إلى الإدارة
// Route::post('/admin/save-crop', function (Request $request) {
//     $cropId = $request->input('crop_id');

//     $crop = Crop::find($cropId);
//     if (!$crop) {
//         return response()->json(['success' => false, 'message' => 'Crop not found']);
//     }

//     $crop->status = 'pending';
//     $crop->save();

//     session(['review_crop_id' => $cropId]);

//     return response()->json(['success' => true]);
// });

// صفحة مراجعة المحاصيل من طرف الإدارة
Route::get('/admin/review-crops', [CropBlockchainController::class, 'index'])->name('review.crops');

// صفحة Filament لحفظ المحاصيل في blockchain
Route::get('/save-in-blockchain', SaveInBlockchainPage::class)
    ->name('filament.pages.save-in-blockchain-page');

// إجراء إرسال المحصول من المستخدم
Route::post('/crops/send-to-admin', [CropBlockchainController::class, 'sendToAdmin']);

// إجراء إداري لتأكيد حفظ المحصول في البلوكشين
Route::middleware(['auth', 'can:isAdmin'])->post(
    '/admin/mark-crop-stored/{crop}',
    [CropBlockchainController::class, 'markStored']
)->name('mark.crop.stored');

// عرض المحصول بالتفصيل
Route::get('/crop/{id}', [App\Http\Controllers\CropController::class, 'show']);

// توجيه رئيسي
Route::get('/', function () {
    return redirect('/user');
});

// إعدادات البروفايل
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;
// use App\Models\Crop;
// use App\Http\Controllers\CropBlockchainController;
// use App\Filament\Pages\SaveInBlockchainPage;
// use Illuminate\Http\Request;

// Route::post('/admin/save-crop', function (Request $request) {
//     $cropId = $request->input('crop_id');

//     $crop = Crop::find($cropId);
//     if (!$crop) {
//         return response()->json(['success' => false, 'message' => 'Crop not found']);
//     }

//     $crop->status = 'pending';
//     $crop->save();

//     session(['review_crop_id' => $cropId]);

//     return response()->json(['success' => true]);
// });

// Route::get('/admin/review-crops', [CropBlockchainController::class, 'saveInBlockchainPage']);

// // Route::post('/admin/save-crop', function (\Illuminate\Http\Request $request) {
// //     $cropId = $request->input('crop_id');

// //     // إما تخزين ID في session:
// //     session(['review_crop_id' => $cropId]);

// //     // أو تغيير حالته في قاعدة البيانات إلى pending:
// //     \App\Models\Crop::where('id', $cropId)->update(['status' => 'pending']);

// //     return response()->json(['success' => true]);
// // });

// Route::get('/save-in-blockchain', SaveInBlockchainPage::class)
//     ->name('filament.pages.save-in-blockchain-page');

// Route::post('/crops/send-to-admin', [CropBlockchainController::class, 'sendToAdmin']);

// Route::get('/admin/review-crops', [CropBlockchainController::class, 'index'])->name('review.crops');

// Route::middleware(['auth','can:isAdmin'])->post(
//     '/admin/mark-crop-stored/{crop}',
//     [CropBlockchainController::class,'markStored']
// )->name('mark.crop.stored');

// Route::get('/', function () {
//     return redirect('/user');
// });

// Route::get('/crop/{id}', [App\Http\Controllers\CropController::class, 'show']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';





// use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;
// use Illuminate\Http\Request;
//  use App\Models\Crop;

// use App\Http\Controllers\CropBlockchainController;

// Route::get('/admin/review-crops', [CropBlockchainController::class, 'index'])->name('review.crops');

// // use App\Http\Controllers\CropController;

// // Route::post('/crops/send-to-admin', [CropController::class, 'sendToAdmin'])->middleware('auth');


// Route::middleware(['auth', 'can:isAdmin'])->post(
//     '/admin/mark-crop-stored/{crop}',
//     [CropBlockchainController::class, 'markStored']
// )->name('mark.crop.stored');


// Route::get('/', function () {
//     return redirect('/user');
// });
//  Route::get('/crop/{id}', [App\Http\Controllers\CropController::class, 'show']);
// // Route::get('/dashboard', function () {
// //     return redirect('/admin');
// // })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
// });
// // Route::middleware(['auth','can:isAdmin'])->post(
// //     '/admin/mark-crop-stored/{crop}',
// //     [CropBlockchainController::class,'markStored']
// // );
// require __DIR__.'/auth.php';




// <?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;
// use Illuminate\Http\Request;
//  use App\Models\Crop;

// use App\Http\Controllers\CropBlockchainController;

// Route::get('/admin/review-crops', [CropBlockchainController::class, 'index'])->name('review.crops');

// // use App\Http\Controllers\CropController;

// // Route::post('/crops/send-to-admin', [CropController::class, 'sendToAdmin'])->middleware('auth');


// Route::post('/admin/mark-crop-stored/{id}', function ($id) {
//     $crop = Crop::findOrFail($id);
//     $crop->status = 'stored';
//     $crop->save();

//     return response()->json(['success' => true]);
// });

// Route::post('/admin/mark-crop-stored/{id}', function ($id) {
//     $crop = \App\Models\Crop::findOrFail($id);
//     $crop->status = 'stored';
//     $crop->save();

//     return response()->json(['message' => 'Crop marked as stored.']);
// });

// Route::get('/', function () {
//     return redirect('/user');
// });
//  Route::get('/crop/{id}', [App\Http\Controllers\CropController::class, 'show']);
// // Route::get('/dashboard', function () {
// //     return redirect('/admin');
// // })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
// });
// $query = Crops::with('farm');
// Route::middleware(['auth','can:isAdmin'])->post(
//     '/admin/mark-crop-stored/{crop}',
//     [CropBlockchainController::class,'markStored']
// );
// if (request()->has('status') && request('status') !== '') {
//     $query->where('status', request('status'));
// }

// $crops = $query->get();

// require __DIR__.'/auth.php';
