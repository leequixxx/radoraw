<?php

use App\Http\Resources\IsotopeResource;
use Illuminate\Http\Request;
use App\Http\Resources\SoilResource;
use App\Http\Resources\RawResource;
use App\Isotope;
use App\AcceptableRadiationLevel;
use App\PollutionFactor;
use App\Raw;
use App\Soil;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('soils', function () {
    return SoilResource::collection(Soil::orderBy('order')->get());
});
Route::get('raws', function (Request $request) {
    $request->validate([
        'soil' => 'required|exists:soils,id',
    ]);

    return RawResource::collection(Raw::whereHas('pollutionFactors', function ($query) use ($request) {
        $query->where('soil_id', $request->input('soil'));
    })->orderBy('order')->get());
});
Route::get('isotopes', function () {
    return IsotopeResource::collection(Isotope::with('element')->orderBy('order')->get());
});

Route::post('result', 'ResultCalculationController@result');
