<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <title>Document</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="mt-2 brand-logo d-flex align-items-center justify-content-between">
                <a href="#" class="mt-2 text-nowrap logo-img">
                    <img src="{{ asset('assets/images/kominfo-jbg.png') }}" width="150" alt="" />
                </a>
                {{-- ini untuk yg atas samping logo --}}
                <div class="navbar-collapse justify-content-end px-0 mt-3" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <a href="#" class="text-nowrap logo-img">
                                    <img src="{{ asset('assets/images/santik-logo.png') }}" width="70"
                                        alt="" />
                                </a>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <nav id="sidebarMenu"
                class="sidebar-nav scroll-sidebar col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse shadow-sm"
                data-simplebar="">
                <div class="">
                    <ul class="nav flex-column">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link active text-white d-flex align-items-center" href="#"
                                aria-expanded="false">
                                <span><i class="bi bi-house-door me-3"></i></span>
                                <span class="hide-menu">Calendar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link text-white d-flex align-items-center" href="#"
                                aria-expanded="false">
                                <span><i class="bi bi-calendar-event me-3"></i></span>
                                <span class="hide-menu">Events</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link text-white d-flex align-items-center" href="#"
                                aria-expanded="false">
                                <span><i class="bi bi-bell me-3"></i></span>
                                <span class="hide-menu">Alert</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <style>
                .nav-link:hover {
                    background-color: #343a40;
                    color: #f8f9fa;
                }
            </style>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-center fw-bold"
                        style="border: 3px solid #5d87ff; padding: 15px 30px; border-radius: 15px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: #333;">
                        SANTIK CALENDAR
                    </h1>
                </div>

                <div id='calendar'></div>
            </main>
        </div>
    </div>
    </div>
    </div>

    <div id="modal-action" class="modal" tabindex="-1">

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.7/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const modal = $('#modal-action')
        const csrfToken = $('meta[name=csrf_token]').attr('content')

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                events: `{{ route('events.list') }}`,
                editable: true,
                dateClick: function(info) {
                    $.ajax({
                        url: `{{ route('events.create') }}`,
                        data: {
                            start_date: info.dateStr,
                            end_date: info.dateStr
                        },
                        success: function(res) {
                            modal.html(res).modal('show')
                            $('.datepicker').datepicker({
                                todayHighlight: true,
                                format: 'yyyy-mm-dd'
                            });

                            $('#form-action').on('submit', function(e) {
                                e.preventDefault()
                                const form = this
                                const formData = new FormData(form)
                                $.ajax({
                                    url: form.action,
                                    method: form.method,
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        modal.modal('hide')
                                        calendar.refetchEvents()
                                    },
                                    error: function(res) {

                                    }
                                })
                            })
                        }
                    })
                },
                eventClick: function({
                    event
                }) {
                    $.ajax({
                        url: `{{ url('events') }}/${event.id}/edit`,
                        success: function(res) {
                            modal.html(res).modal('show')

                            $('#form-action').on('submit', function(e) {
                                e.preventDefault()
                                const form = this
                                const formData = new FormData(form)
                                $.ajax({
                                    url: form.action,
                                    method: form.method,
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        modal.modal('hide')
                                        calendar.refetchEvents()
                                    }
                                })
                            })
                        }
                    })
                },
                eventDrop: function(info) {
                    const event = info.event
                    $.ajax({
                        url: `{{ url('events') }}/${event.id}`,
                        method: 'put',
                        data: {
                            id: event.id,
                            start_date: event.startStr,
                            end_date: event.end.toISOString().substring(0, 10),
                            title: event.title,
                            category: event.extendedProps.category
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            accept: 'application/json'
                        },
                        success: function(res) {
                            iziToast.success({
                                title: 'Success',
                                message: res.message,
                                position: 'topRight'
                            });
                        },
                        error: function(res) {
                            const message = res.responseJSON.message
                            info.revert()
                            iziToast.error({
                                title: 'Error',
                                message: message ?? 'Something wrong',
                                position: 'topRight'
                            });
                        }
                    })
                },
                eventResize: function(info) {
                    const {
                        event
                    } = info
                    $.ajax({
                        url: `{{ url('events') }}/${event.id}`,
                        method: 'put',
                        data: {
                            id: event.id,
                            start_date: event.startStr,
                            end_date: event.end.toISOString().substring(0, 10),
                            title: event.title,
                            category: event.extendedProps.category
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            accept: 'application/json'
                        },
                        success: function(res) {
                            iziToast.success({
                                title: 'Success',
                                message: res.message,
                                position: 'topRight'
                            });
                        },
                        error: function(res) {
                            const message = res.responseJSON.message
                            info.revert()
                            iziToast.error({
                                title: 'Error',
                                message: message ?? 'Something wrong',
                                position: 'topRight'
                            });
                        }
                    })
                }


            });
            calendar.render();
        });
    </script>
    {{-- ini untuk hamburger sidebar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarMenu = document.getElementById('sidebarMenu');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeBtn = document.getElementById('sidebarCollapse');

            // Toggle sidebar when hamburger icon is clicked
            hamburgerIcon.addEventListener('click', function() {
                sidebarMenu.classList.toggle('active');
            });

            // Close sidebar when close button is clicked
            closeBtn.addEventListener('click', function() {
                sidebarMenu.classList.remove('active');
            });
        });
    </script>


</body>
<footer class="footer mt-auto py-3 bg-dark text-white" style=" margin-top: 30px;">
    <div class="container text-center">
        <span class="text-muted">© 2024 SANTIK - All Rights Reserved.</span>
    </div>
</footer>

</html>
