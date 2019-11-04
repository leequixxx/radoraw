<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Soil;
use App\Http\Resources\SoilResource;
use App\Http\Resources\RawResource;
use App\Raw;
use App\Isotope;
use App\AcceptableRadiationLevel;
use App\PollutionFactor;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::prefix('api')->group(function () {
    Route::get('soils', function () {
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
});
