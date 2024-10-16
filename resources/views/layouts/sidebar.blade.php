<nav id="sidebarMenu" class="sidebar-nav scroll-sidebar col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse shadow-sm"
    data-simplebar="" style="min-width: 200px; max-width: 400px; resize: horizontal; overflow: auto;">
    <div class="">
        <a href="#" class="mt-2 text-nowrap logo-img">
            <img src="{{ asset('assets/images/kominfo-jbg.png') }}" width="150" alt=""
                style="margin-left : 20px" />
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

    <script>
        const sidebar = document.getElementById('sidebar');
        const resizeHandle = document.querySelector('.resize-handle');

        let isResizing = false;

        resizeHandle.addEventListener('mousedown', (event) => {
            isResizing = true;
        });

        document.addEventListener('mousemove', (event) => {
            if (isResizing) {
                const newWidth = event.clientX - sidebar.getBoundingClientRect().left;
                if (newWidth > 100 && newWidth < 1000) { // Minimal and maximal width
                    sidebar.style.width = `${newWidth}px`;
                }
            }
        });

        document.addEventListener('mouseup', () => {
            isResizing = false;
        });
    </script>

</nav>

<style>
    .resize-handle {
        width: 10px;
        /* Width of the resize handle */
        height: 100%;
        /* Full height */
        background: transparent;
        /* Make the handle transparent */
        position: absolute;
        /* Absolute position for resizing */
        right: 0;
        /* Align to the right */
        top: 0;
        /* Align to the top */
        cursor: ew-resize;
        /* Cursor indicates resizing */
    }
</style>
