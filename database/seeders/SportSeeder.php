<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SportSeeder extends Seeder {
    public function run() {
        Sport::truncate();

        Sport::create(['sport_name' => 'football']);
        Sport::create(['sport_name' => 'hockey']);
        Sport::create(['sport_name' => 'motorsport']);
        Sport::create(['sport_name' => 'basketball']);
        Sport::create(['sport_name' => 'tennis']);
        Sport::create(['sport_name' => 'athletics']);
    }
}
