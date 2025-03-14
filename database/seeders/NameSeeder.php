<?php

namespace Database\Seeders;

use App\Models\Name;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/names.json');
        $names = json_decode($json);

        foreach ($names as $name) {
            Name::firstOrCreate(
                [
                    'name' => Str::kebab(($name->name))
                ],
                [
                    'label' => $name->name,
                    'pronunciation' => $name->pronunciation,
                    'description' => $name->description,
                ]
            );
        }
    }
}
