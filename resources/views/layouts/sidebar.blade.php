<nav id="sidebarMenu" class="sidebar-nav scroll-sidebar col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse shadow-sm"
    data-simplebar="" style="min-width: 200px; max-width: 400px; resize: horizontal; overflow: auto;">
    <div class="">
        <a href="#" class="text-nowrap logo-img" style="margin-top: 30px; display: inline-block; margin-left: 10px;">
            <img src="{{ asset('assets/images/kominfo-jbg.png') }}" width="150" alt="" />
        </a>

        <ul class="nav flex-column">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <h3>
                    <span class="hide-menu">Features</span>
                </h3>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link active text-white d-flex align-items-center" href="#"
                    aria-expanded="false">
                    <span><i class="bi bi-house-door me-3"></i></span>
                    <span class="hide-menu">Calendar</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link text-white d-flex align-items-center" href="{{ route('events.history') }}"
                    aria-expanded="false">
                    <span><i class="bi bi-calendar-event me-3"></i></span>
                    <span class="hide-menu">Event History</span>
                </a>
            </li>
            <li class="sidebar-item">
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <a class="sidebar-link text-white d-flex align-items-center" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span><i class="bi bi-box-arrow-right me-3"></i></span>
                        <span class="hide-menu">Logout</span>
                    </a>
                </form>
            </li>
        </ul>
        <div id="sidebar" class="sidebar">
            <h3>Detail Event</h3>
            <ul id="event-list"></ul>
            <div class="resize-handle"></div>
        </div>
    </div>


</nav>

<style>
    .sidebar-nav {
        width: 310px !important;
        min-width: 250px !important;
        max-width: 500px !important;
        scrollbar-width: none;
        /* Untuk Firefox */
        -ms-overflow-style: none;
        /* Untuk IE/Edge */
        overflow: auto;
    }

    .sidebar-nav::-webkit-scrollbar {
        display: none;
        /* Untuk Chrome, Safari, Opera */
    }

    #sidebar h3 {
        color: white !important;
    }

    .sidebar-item .sidebar-link.active {
        color: white !important;
    }
</style>
