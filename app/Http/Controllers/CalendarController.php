<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        // Ambil semua event dari database
        $events = Event::all(); // Atau gunakan paginasi jika perlu

        // Kirim data ke view
        return view('event', compact('events')); // 'events' adalah nama variabel yang akan tersedia di view
    }
}
