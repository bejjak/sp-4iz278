<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder {
    public function run() {
        Event::truncate();

        Event::create([
            'event_name' => 'Barcelona - Real Madrid',
            'start_date' => '2021-04-30',
            'img' => 'http://www.fotbalportal.cz/obrazky/og-imgs/c98352a9b51d8850062d18c7443eedbd.jpeg',
            'price' => 2750,
            'competition' => 'La Liga',
            'capacity' => 50,
            'description' => 'One of the most famous football derby in the world. El Clásico. See superstars like Lionel Messi or Sergio Ramos.',
            'sport_id' => 1,
            'place_id' => 1
        ]);

        Event::create([
            'event_name' => 'AC Sparta Praha - SK Slavia Praha',
            'start_date' => '2021-09-25',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQezbNyWwKEFfEGNm0ytgyXl4dYxlWWkkxrA&usqp=CAU',
            'price' => 499.99,
            'competition' => 'Fortuna Liga',
            'capacity' => 2000,
            'description' => 'Most famous football derby in Czech republic. The match starts at 15.00, so you should be at the Generali Stadium at Letná in Prague one hour early.',
            'sport_id' => 1,
            'place_id' => 2
        ]);

        Event::create([
            'event_name' => 'FC Viktoria Plzeň - AC Sparta Praha',
            'start_date' => '2022-03-22',
            'img' => 'https://www.sofascore.com/images/share/1x1/viktoria-plzen-sparta-praha-9509435.png',
            'price' => 345,
            'competition' => 'Fortuna Liga',
            'capacity' => 350,
            'sport_id' => 1,
            'place_id' => 3
        ]);

        Event::create([
            'event_name' => 'Boston Bruins - Washington Capitals',
            'start_date' => '2021-05-30',
            'img' => 'http://s.espncdn.com/stitcher/sports/hockey/nhl/events/401272465.png?templateId=espn.com.share.1',
            'price' => 4800,
            'competition' => 'NHL',
            'capacity' => 20,
            'sport_id' => 2,
            'place_id' => 7
        ]);

        Event::create([
            'event_name' => 'Boston Bruins - Pittsburgh Penguins',
            'start_date' => '2022-12-02',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRJiRa7j8O7pKF41xci2S8PBOlEaxqVLpebA&usqp=CAU',
            'price' => 3900,
            'competition' => 'NHL',
            'capacity' => 10,
            'sport_id' => 2,
            'place_id' => 7
        ]);

        Event::create([
            'event_name' => 'New York Rangers - New York Islanders',
            'start_date' => '2021-11-01',
            'img' => 'https://img.msg.com/wp-content/uploads/2018/11/NYRvsNYISL_Default_Large-756x568_1.jpg?w=500',
            'price' => 5980,
            'competition' => 'NHL',
            'capacity' => 30,
            'sport_id' => 2,
            'place_id' => 6
        ]);

        Event::create([
            'event_name' => 'Monaco Grand Prix',
            'start_date' => '2022-05-26',
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/9/90/Circuit_Monaco.png',
            'price' => 5849.90,
            'competition' => 'formula 1',
            'capacity' => 20,
            'sport_id' => 3,
            'place_id' => 4
        ]);

        Event::create([
            'event_name' => 'Azerbaijan Grand Prix',
            'start_date' => '2022-06-04',
            'end_date' => '2022-06-06',
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Baku-F1-Street-Circuit-rev1.png',
            'price' => 7250,
            'competition' => 'formula 1',
            'capacity' => 10,
            'sport_id' => 3,
            'place_id' => 5
        ]);
    }
}
