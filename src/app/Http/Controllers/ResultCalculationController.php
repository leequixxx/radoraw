<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Raw;
use App\Isotope;
use App\PollutionFactor;
use App\AcceptableRadiationLevel;
use App\Http\Resources\IsotopeResource;

class ResultCalculationController extends Controller
{
    private const CONVERT_COEFFICIENT = 37;

    public function result(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'soil' => 'required|exists:soils,id',
    
            'isotopes' => 'required|array',
            'isotopes.*.id' => 'required|exists:isotopes,id',
            'isotopes.*.value' => 'required|numeric|min:0.001|max:999',
    
            'raws' => 'required|array',
            'raws.*' => 'required|exists:raws,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors(),
            ], 422);
        }


        $isotopesInput = $request->input('isotopes', []);
        $isotopes = Isotope::whereIn('id', array_map(function ($isotope) { return $isotope['id']; }, $request->input('isotopes', [])))
            ->get();

        $isotopesInput = collect(array_map(function ($isotopInput) use ($isotopes) {
            return [
                'id' => $isotopInput['id'],
                'isotope' => $isotopes->where('id', $isotopInput['id'])->first(),
                'value' => $isotopInput['value'],
            ];
        }, $isotopesInput));

        $raws = Raw::whereIn('id', $request->input('raws', []))
            ->get();
        $pollutionFactors = PollutionFactor::whereIn('raw_id', $request->input('raws', []))
            ->whereIn('isotope_id', array_map(function ($isotope) { return $isotope['id']; }, $request->input('isotopes', [])))
            ->where('soil_id', $request->input('soil'))
            ->get();
        $acceptableRadiationLevels = AcceptableRadiationLevel::whereIn('raw_id', $request->input('raws', []))
            ->whereIn('isotope_id', array_map(function ($isotope) { return $isotope['id']; }, $request->input('isotopes', [])))
            ->get();


        return ['data' => $this->calculateResult($isotopesInput, $raws, $pollutionFactors, $acceptableRadiationLevels, $request->input('soil'))];
    }

    private function calculateResult($isotopes, $raws, $pollutionFactors, $acceptableRadiationLevels, $soilId)
    {
        return $raws->map(function (Raw $raw) use ($isotopes, $acceptableRadiationLevels, $pollutionFactors, $soilId) {
            $data = [
                'raw' => $raw,
                'isotopes' => $isotopes->map(function ($isotope) use ($raw, $acceptableRadiationLevels, $pollutionFactors, $soilId) {
                    $acceptableRadiationLevel = $acceptableRadiationLevels
                        ->where('isotope_id', $isotope['id'])
                        ->where('raw_id', $raw->id)
                        ->first();
                    
                    $data = [
                        'isotope' => (new IsotopeResource($isotope['isotope']))->toArray(request()),

                        'max_level' => $acceptableRadiationLevel->level,

                        'level' => $this->calculateRadiationLevel($pollutionFactors
                            ->where('isotope_id', $isotope['id'])
                            ->where('raw_id', $raw->id)
                            ->where('soil_id', $soilId)
                            ->first()->coefficient ?? 1, $isotope['value']),

                        'acceptable' => true,
                        'action_on_normal' => $acceptableRadiationLevel->action_on_normal,
                        'action_on_danger' => $acceptableRadiationLevel->action_on_danger,
                    ];

                    $data['acceptable'] = $data['max_level'] >= $data['level'];

                    return $data;
                })->toArray(),

                'action' => '',
            ];

            $invalidIsotopes = array_filter($data['isotopes'], function ($isotope) {
                return !$isotope['acceptable'];
            });

            if (!empty($invalidIsotopes)) {
                $actions = array_map(function ($invalidIsotope) { return $invalidIsotope['action_on_danger']; }, $invalidIsotopes);
                $actions = array_unique($actions);

                $data['action'] = implode('/', $actions);
            } else {
                $actions = array_map(function ($isotope) { return $isotope['action_on_normal']; }, $data['isotopes']);                $actions = array_unique($actions);
                $actions = array_unique($actions);
                
                $data['action'] = implode('/', $actions);
            }

            return $data;
        });
    }

    private function calculateRadiationLevel($coefficient, $radiationLevel)
    {
        return self::CONVERT_COEFFICIENT * $radiationLevel * $coefficient;
    }
}
