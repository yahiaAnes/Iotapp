<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Crops;
class Controller extends BaseController
{
 
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
// public function render()
// {
//     $cropsToReview = Crop::with('farm')->where('status', 'pending')->get();

//     return view('filament.pages.save-in-blockchain-page', [
//         'crops' => $cropsToReview
//     ]);
// }
