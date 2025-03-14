<?php

namespace Database\Seeders;

use App\Models\Name;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            'Dionysus' => null,
            'Hercules' => null,
            'Jason' => null,
            'Prometheus' => null,
            'Helios' => null,
            'Athena' => null,
            'Perseus' => null,
            'Chaos' => null,
            'Theseus' => null,
            'Ajax' => null,
            'Iris' => null,
            'Appollo' => null,
            'Nike' => null,
            'Hector' => null,
            'Aetos' => null,
            'Hyperion' => null,
            'IO' => null,
            'Atlas' => null,
            'Pegasus' => null,
            'Orion' => null,
        ];

        foreach ($teams as $key => $description) {
            $nameStr = Str::kebab($key);

            $name = Name::firstOrCreate(
                [
                    'name' => $nameStr
                ],
                [
                    'label' => $key,
                ]
            );

            $team = Team::firstOrCreate(
                [
                    'name' => $nameStr
                ],
                [
                    'label' => $name->label,
                    'description' => $description,
                    'name_id' => $name->id
                ]
            );
        }
    }
}
