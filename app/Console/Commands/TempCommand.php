<?php

namespace App\Console\Commands;

use App\AcceptableRadiationLevel;
use App\Isotope;
use App\PollutionFactor;
use App\Raw;
use App\Soil;
use Illuminate\Console\Command;

class TempCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temp:cmd {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $raws = Raw::orderBy('order')->pluck('id')->toArray();
        $rawIndex = 0;

        $isotopes = Isotope::orderBy('order')->pluck('id')->toArray();
        $isotopeIndex = 0;

        $filePath = $this->argument('file');
        $file = fopen($filePath, 'r');

        AcceptableRadiationLevel::truncate();

        while (($data = fgetcsv($file))) {
            for ($isotopeIndex = 0; $isotopeIndex < count($isotopes); $isotopeIndex++) {

                $ind = 0;
                $levels = array_map(function ($before, $message) use ($data, &$ind) {
                    return [
                        'before' => $before,
                        'message' => $message,
                        'isOk' => ($ind++ < ((int) $data[3])),
                    ];
                }, json_decode($data[$isotopeIndex], true), json_decode($data[2], true));

                $levels = [
                    'acceptable' => $levels,
                    'unacceptable_message' => 'Переработке не подлежит',
                ];

                AcceptableRadiationLevel::create([
                    'raw_id' => $raws[$rawIndex],
                    'isotope_id' => $isotopes[$isotopeIndex],
                    'levels' => $levels,
                ]);
            }
            $rawIndex++;
        }

        fclose($file);
    }
}
