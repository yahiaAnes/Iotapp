<?php
use App\Http\Controllers\CropController;



use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\BlockchainRequest;

Route::post('/crops/send-to-admin', [CropController::class, 'receiveCropsFromUser'])->name('crops.sendToAdmin');
Route::get('/admin/crops-review', [CropController::class, 'showCropsForAdmin'])->name('admin.cropsReview');
Route::post('/admin/crops-upload-blockchain', [CropController::class, 'uploadCropsToBlockchain'])->name('admin.cropsUploadBlockchain');


Route::post('/admin/save-blockchain/{id}', function ($id) {
    $request = BlockchainRequest::findOrFail($id);

    // من هنا تنفذ عملية الحفظ في البلوكشاين
    // بعد نجاح العملية:
    $request->is_saved_to_blockchain = true;
    $request->save();

    return redirect()->back()->with('success', 'تم الحفظ في البلوكشاين بنجاح');
})->name('admin.blockchain.save');


Route::get('/', function () {
    return redirect('/user');
});
 Route::get('/crop/{id}', [App\Http\Controllers\CropController::class, 'show']);
// Route::get('/dashboard', function () {
//     return redirect('/admin');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';





// use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;

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

// require __DIR__.'/auth.php'; -->
