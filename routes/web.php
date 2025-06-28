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
    return view('welcome');
});

// إعدادات البروفايل
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
