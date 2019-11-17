<?php

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
    sleep(5);
    return SoilResource::collection(Soil::orderBy('order')->get());
});
Route::get('raws', function () {
    return RawResource::collection(Raw::orderBy('order')->get());
});
Route::get('isotopes', function () {
    return Isotope::with('element')->orderBy('order')->get();
});


Route::get('acceptable_radiation_levels', function () {
    return AcceptableRadiationLevel::with('raw', 'isotope')->orderBy('order')->get();
});
Route::get('pollution_factors', function () {
    return PollutionFactor::with('raw', 'soil', 'isotope')->orderBy('order')->get();
});
