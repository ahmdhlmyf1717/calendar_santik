<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Event;

class EventHistoryNew extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'start_date'; // Kolom default untuk sorting
    public $sortDirection = 'desc'; // Arah default (dari terbaru)

    // Reset pagination saat melakukan search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Fungsi untuk sorting
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    // Fungsi render untuk mengambil event
    public function render()
    {
        $today = date('Y-m-d');

        // Query event yang sudah lewat
        $pastEvents = Event::where('start_date', '<', $today)
            ->where('title', 'like', '%' . $this->search . '%') // Search
            ->orderBy($this->sortField, $this->sortDirection) // Sorting
            ->paginate(10); // Pagination

        return view('livewire.event-history', ['pastEvents' => $pastEvents]);
    }
}
