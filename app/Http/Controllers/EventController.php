<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('event');
    }

    public function listEvent(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $events = Event::where('start_date', '>=', $start)
            ->where('end_date', '<=', $end)->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'title' => $item->title,
                'start' => $item->start_date,
                'end' => date('Y-m-d', strtotime($item->end_date . '+1 days')),
                'category' => $item->category,
                'className' => ['bg-' . $item->category]
            ]);

        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        return view('event-form', ['data' => $event, 'action' => route('events.store')]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(EventRequest $request, Event $event)
    {
        $event->reminder = $request->has('reminder'); //true false
        return $this->update($request, $event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('event-form', ['data' => $event, 'action' => route('events.update', $event->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        if ($request->has('delete')) {
            return $this->destroy($event);
        }
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->title = $request->title;
        $event->category = $request->category;
        $event->reminder = $request->has('reminder'); //update status buat reminder

        $event->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Save data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
            'swal' => [
                'icon' => 'success',
                'title' => 'Terhapus!',
                'text' => 'Data event telah dihapus.'
            ]
        ]);
    }

    public function upcoming(Request $request)
    {

        $today = date('Y-m-d');

        $events = Event::where('start_date', $today)
            ->where('reminder', true) // Hanya acara dengan reminder aktif
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'title' => $item->title,
                'start_date' => $item->start_date,
                'reminder' => $item->reminder
            ]);

        return response()->json($events);
    }

    //ini untuk history events
    public function history(Request $request)
    {
        // Ambil tanggal hari ini
        $today = date('Y-m-d');

        // Ambil semua acara yang sudah berlalu
        $pastEvents = Event::where('start_date', '<', $today)
            ->orderBy('start_date', 'desc') // Urutkan berdasarkan tanggal mulai (paling terbaru)
            ->paginate(5);

        return view('events.history', compact('pastEvents'));
    }
    public function search(Request $request)
    {

        if ($request->has('search')) {
            $pastEvents = Event::where('title', 'LIKE', '%' . $request->search . '%')
                ->where('end_date', '<', now())
                ->orderBy('end_date', 'desc')
                ->paginate(5);
        } else {
            $pastEvents = Event::where('end_date', '<', now())
                ->orderBy('end_date', 'desc')
                ->paginate(5);
        }

        if ($request->ajax()) {
            return view('events._eventTable', ['pastEvents' => $pastEvents]);
        }

        return view('events.history', ['pastEvents' => $pastEvents]);
    }
}
