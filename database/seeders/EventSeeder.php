<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event_name' => 'Music Festival',
                'date' => Carbon::today()->addDays(10),
                'start_time' => '18:00:00',
                'end_time' => '23:00:00',
                'cost' => 50.00,
            ],
            [
                'event_name' => 'Tech Conference',
                'date' => Carbon::today()->addDays(20),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'cost' => 150.00,
            ],
            [
                'event_name' => 'Art Exhibition',
                'date' => Carbon::today()->addDays(15),
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
                'cost' => 30.00,
            ],
            [
                'event_name' => 'Charity Gala',
                'date' => Carbon::today()->addDays(25),
                'start_time' => '19:00:00',
                'end_time' => '23:30:00',
                'cost' => 100.00,
            ],
            [
                'event_name' => 'Startup Pitch Night',
                'date' => Carbon::today()->addDays(5),
                'start_time' => '17:00:00',
                'end_time' => '20:00:00',
                'cost' => 25.00,
            ],
        ];

        // Insert events into the database
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
