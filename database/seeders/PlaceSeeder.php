<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder {
    public function run() {
        Place::truncate();

        Place::create([
            'place_name' => 'Camp Nou',
            'city' => 'Barcelona',
            'country' => 'Spain'
        ]);

        Place::create([
            'place_name' => 'Generali arena',
            'city' => 'Praha',
        ]);

        Place::create([
            'place_name' => 'Doosan arena',
            'city' => 'Plzeň',
        ]);

        Place::create([
            'place_name' => 'Circuit de Monaco',
            'city' => 'Monte Carlo',
            'country' => 'Monaco'
        ]);

        Place::create([
            'place_name' => 'Baku City Circuit',
            'city' => 'Baku',
            'country' => 'Azerbaijan'
        ]);

        Place::create([
            'place_name' => 'Madison Square Garden',
            'city' => 'New York',
            'country' => 'USA'
        ]);

        Place::create([
            'place_name' => 'TD Garden',
            'city' => 'Boston',
            'country' => 'USA'
        ]);
    }
}
