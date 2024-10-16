<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [[1, 3,], 5, 6, 9, [12, 13]];
        $fake = fake('idID');
        $today = date('Y-m-d');

        foreach ($days as $day) {
            if (is_array($day)) {
                $events[] = [
                    'title' => $fake->sentence(3),
                    'start_date' => date('Y-m-d', strtotime($today . '+ ' . $day[0] . ' days')),
                    'end_date' => date('Y-m-d', strtotime($today . '+ ' . $day[1] . ' days')),
                    'category' => $fake->randomElement(['success', 'danger', 'warning', 'info']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            } else {
                $events[] = [
                    'title' => $fake->sentence(3),
                    'start_date' => date('Y-m-d', strtotime($today . '+ ' . $day . ' days')),
                    'end_date' => date('Y-m-d', strtotime($today . '+ ' . $day . ' days')),
                    'category' => $fake->randomElement(['success', 'danger', 'warning', 'info']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Event::insert($events);
    }
}
