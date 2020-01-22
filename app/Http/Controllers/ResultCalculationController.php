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
            'isotopes.*.value' => 'required|numeric',

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

                    $levels = collect($acceptableRadiationLevel->levels['acceptable'] ?? [])
                        ->sortByDesc('before');
                    $maxAcceptableLevel = $levels->filter(function ($level) { return $level['isOk']; })->max('before');
                    $newLevels = [];
                    $levels->each(function ($level) use (&$newLevels) {
                        $newLevels[] = $level;
                    });

                    $data = [
                        'isotope' => (new IsotopeResource($isotope['isotope']))->toArray(request()),

                        'max_level' => $maxAcceptableLevel,
                        'levels' => $newLevels,

                        'level' => $this->calculateRadiationLevel($pollutionFactors
                            ->where('isotope_id', $isotope['id'])
                            ->where('raw_id', $raw->id)
                            ->where('soil_id', $soilId)
                            ->first()->coefficient ?? 0, $isotope['value']),

                        'acceptable' => null,
                        'unacceptable_message' => $acceptableRadiationLevel->levels['unacceptable_message'],
                    ];

                    $data['acceptable'] = $data['level'] <= $maxAcceptableLevel;

                    return $data;
                })->toArray(),

                'action' => '',
            ];

            $actions = [];
            $maxIndices = [];
            foreach ($data['isotopes'] as $isotope) {
                foreach ($isotope['levels'] as $index => $level) {
                    if ($isotope['level'] > $level['before']) {
                        $maxIndices[] = $index;
                        break;
                    }
                }
            }
            if (empty($maxIndices)) {
                $maxIndices = [count($data['isotopes'][0]['levels'])];
            }
            $actionsBefore = min($maxIndices);

            foreach ($data['isotopes'] as $isotope) {
                for ($i = 0; $i < $actionsBefore; $i++) {
                    $actions[] = $isotope['levels'][$i]['message'];
                }
            }
            $actions = array_unique($actions);

            if (!empty($actions)) {
                $data['action'] = implode('. ', $actions) . '.';
            } else {
                $actions = array_map(function ($isotope) {
                    return $isotope['unacceptable_message'];
                }, $data['isotopes']);
                $data['action'] = array_unique($actions)[0] ?? '';
            }

            return $data;
        });
    }

    private function calculateRadiationLevel($coefficient, $radiationLevel)
    {
        return self::CONVERT_COEFFICIENT * $radiationLevel * $coefficient;
    }
}
