<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">


<div class="container">
    <h1>Event History</h1>

    <div class="row mb-4">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search events..." wire:model="search">
        </div>
    </div>
    @livewire('event-history-new')


    @if ($pastEvents->isEmpty())
        <p>No past events available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>
                        <a href="#" wire:click.prevent="sortBy('title')">
                            Title
                            @if ($sortField == 'title')
                                <i class="bi bi-arrow-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="#" wire:click.prevent="sortBy('start_date')">
                            Start Date
                            @if ($sortField == 'start_date')
                                <i class="bi bi-arrow-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="#" wire:click.prevent="sortBy('end_date')">
                            End Date
                            @if ($sortField == 'end_date')
                                <i class="bi bi-arrow-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th>Reminder</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pastEvents as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->end_date }}</td>
                        <td>{{ $event->reminder ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $pastEvents->links() }}
        </div>
    @endif
</div>


<style>
    /* Search Box Styling */
    input[type="text"] {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
        max-width: 400px;
        font-size: 1.1em;
        margin-bottom: 20px;
    }

    /* Pagination Styling */
    .pagination {
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #007bff;
        padding: 10px 15px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination .page-item .page-link:hover {
        background-color: #007bff;
        color: #fff;
    }

    /* Sorting Arrow */
    .bi-arrow-up,
    .bi-arrow-down {
        font-size: 1.2em;
        margin-left: 5px;
    }
</style>
