<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Acara;

class AcaraSeeder extends Seeder
{
    public function run()
    {
        Acara::create(['title' => 'Acara 1', 'date' => '2024-10-10', 'description' => 'Deskripsi acara 1']);
        Acara::create(['title' => 'Acara 2', 'date' => '2024-10-15', 'description' => 'Deskripsi acara 2']);
    }
}
