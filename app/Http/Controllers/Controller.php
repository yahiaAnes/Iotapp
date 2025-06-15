<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Crops;
class Controller extends BaseController
{
    public function saveInBlockchainPage(Request $request)
{
    $status = $request->input('status');
    $query = Crop::query();
    if ($status) {
        $query->where('status', $status);
    }
    $crops = $query->with('farm')->get();

    return view('filament.pages.save-in-blockchain-page', compact('crops'));
}



    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    
    public function render()
{
    $query = Crops::with('farm');

    if (request()->has('status') && request('status') !== '') {
        $query->where('status', request('status'));
    }

    $crops = $query->get();

    return view('filament.pages.save-in-blockchain-page', [
        'crops' => $crops
    ]);
}
}





// public function render()
// {
//     $cropsToReview = Crop::with('farm')->where('status', 'pending')->get();

//     return view('filament.pages.save-in-blockchain-page', [
//         'crops' => $cropsToReview
//     ]);
// }
