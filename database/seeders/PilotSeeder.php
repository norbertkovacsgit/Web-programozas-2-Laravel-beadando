<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pilot;

class PilotSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/pilota.txt');

        if (!file_exists($path)) {
            $this->command?->error("Hiányzik a pilota.txt fájl: {$path}");
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (count($lines) <= 1) {
            $this->command?->warn('A pilota.txt üres vagy csak fejlécet tartalmaz.');
            return;
        }

        array_shift($lines);

        foreach ($lines as $line) {
            $line = mb_convert_encoding($line, 'UTF-8', ['ISO-8859-2', 'UTF-8']);

            $cols = explode("\t", $line);

            if (count($cols) < 5) {
                continue;
            }

            [$id, $name, $gender, $birth, $nationality] = $cols;

            $name        = $this->toUtf8($name);
            $gender      = $this->toUtf8($gender);
            $nationality = $this->toUtf8($nationality);

            Pilot::updateOrCreate(
                ['id' => (int) $id],
                [
                    'name'        => $name,
                    'gender'      => $gender ?: null,
                    'birth_date'  => $this->parseDate($birth),
                    'nationality' => $nationality,
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
