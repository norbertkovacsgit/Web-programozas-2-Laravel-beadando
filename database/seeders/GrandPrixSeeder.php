<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GrandPrix;

class GrandPrixSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/gp.txt');

        if (!file_exists($path)) {
            $this->command?->error("Hiányzik a gp.txt fájl: {$path}");
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (count($lines) <= 1) {
            $this->command?->warn('A gp.txt üres vagy csak fejlécet tartalmaz.');
            return;
        }

        array_shift($lines);

        foreach ($lines as $line) {
            $line = mb_convert_encoding($line, 'UTF-8', ['ISO-8859-2', 'UTF-8']);
            $cols = preg_split('/\s*[\t;]\s*/', trim($line));

            if (count($cols) < 3) {
                continue;
            }

            [$dateSrc, $name, $location] = $cols;

            GrandPrix::updateOrCreate(
                [
                    'date' => $this->parseDate($dateSrc),
                    'name' => $name,
                ],
                [
                    'location' => $location,
                ]
            );
        }
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

        return sprintf('%04d-%02d-%02d', (int)$y, (int)$m, (int)$d);
    }
}
