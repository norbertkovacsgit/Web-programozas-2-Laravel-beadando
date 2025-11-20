<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/eredmeny.txt');

        if (!file_exists($path)) {
            $this->command?->error("Hiányzik az eredmeny.txt fájl: {$path}");
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (count($lines) <= 1) {
            $this->command?->warn('Az eredmeny.txt üres vagy csak fejlécet tartalmaz.');
            return;
        }

        array_shift($lines);

        $inserted = 0;
        $skipped  = 0;

        foreach ($lines as $line) {
            $line = mb_convert_encoding($line, 'UTF-8', ['ISO-8859-2', 'UTF-8']);

            $cols = explode("\t", $line);

            if (count($cols) < 7) {
                $skipped++;
                continue;
            }

            [$dateSrc, $pilotIdSrc, $positionSrc, $failure, $team, $carType, $engine] = $cols;

            $dateSrc   = $this->toUtf8($dateSrc);
            $failure   = $this->toUtf8($failure);
            $team      = $this->toUtf8($team);
            $carType   = $this->toUtf8($carType);
            $engine    = $this->toUtf8($engine);

            $position = is_numeric($positionSrc) ? (int)$positionSrc : null;

            Result::create([
                'date'       => $this->parseDate($dateSrc),
                'pilot_id'   => (int) $pilotIdSrc,
                'position'   => $position,
                'failure'    => $failure !== '' ? $failure : null,
                'team'       => $team,
                'car_type'   => $carType,
                'engine'     => $engine,
            ]);

            $inserted++;
        }

        $this->command?->info("ResultSeeder: beszúrt sorok: {$inserted}, kihagyott sorok: {$skipped}");
    }

    private function parseDate(string $src): ?string
    {
        $src = trim($src);
        if ($src === '') {
            return null;
        }

        $src = rtrim($src, '.');
        $parts = explode('.', $src);

        if (count($parts) !== 3) {
            return null;
        }

        [$y, $m, $d] = $parts;

        return sprintf('%04d-%02d-%02d', (int) $y, (int) $m, (int) $d);
    }

    private function toUtf8(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim($value);
        if ($value === '') {
            return $value;
        }

        return mb_convert_encoding($value, 'UTF-8', ['ISO-8859-2', 'UTF-8']);
    }
}
