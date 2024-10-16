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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <title>Calendar SANTIK</title>
    <link rel="icon" href="{{ asset('assets/images/santik-logo.png') }}" type="image/png">
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
                            <a href="#" class="text-nowrap logo-img">
                                <img src="{{ asset('assets/images/santik-logo.png') }}" width="70" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            @include('layouts.sidebar')

            <style>
                /* Sidebar container with flexbox */
                #sidebar-container {
                    display: flex;
                    flex-direction: column;
                    /* Flex-direction membuat elemen di dalam mengikuti alur vertikal */
                    width: 100%;
                }

                /* Gaya untuk sidebar */
                #sidebar {
                    background: linear-gradient(135deg, rgba(0, 123, 255, 0.9), rgba(0, 75, 160, 0.9));
                    padding: 15px;
                    max-width: 100%;
                    /* Buat sidebar lebar fleksibel */
                    overflow: auto;
                    border-radius: 7px;
                    display: flex;
                    flex-direction: column;
                    /* Mengatur konten di dalam sidebar */
                }

                /* Gaya untuk event list */
                #event-list {
                    list-style-type: none;
                    padding: 0;
                    margin: 0;
                    width: 100%;
                    /* Buat event list menyesuaikan lebar */
                }

                /* Gaya untuk item di event list */
                #event-list li {
                    padding: 10px;
                    margin: 5px 0;
                    background-color: #ffffff;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                    white-space: normal;
                    word-wrap: break-word;
                    border: 1px solid #ced4da;
                    width: 100%;
                    /* Buat item mengikuti lebar parent */
                }

                /* Efek hover untuk item di event list */
                #event-list li:hover {
                    background-color: #ffffff;
                }

                /* Pastikan simbol berada di dalam item yang bisa melebarkan */
                #event-list li:before {
                    content: '';
                    display: block;
                    width: 8px;
                    height: 8px;
                    background-color: #0d6efd;
                    border-radius: 50%;
                    position: absolute;
                    left: -20px;
                    top: 50%;
                    transform: translateY(-50%);
                }

                /* H3 Title Styling */
                h3 {
                    font-weight: bold;
                    color: #343a40;
                    margin-bottom: 15px;
                    width: 100%;
                    /* Mengisi seluruh lebar */
                }

                /* Modal Styling */
                .modal {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    z-index: 1050;
                }
            </style>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-center fw-bold"
                        style="border: 3px solid #5d87ff; padding: 15px 30px; border-radius: 15px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: #333;">
                        CALENDAR
                    </h1>
                </div>

                <div id='calendar'></div>
            </main>
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
        const modal = $('#modal-action');
        const csrfToken = $('meta[name=csrf_token]').attr('content');

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var eventListEl = document.getElementById('event-list'); // Target sidebar

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                events: `{{ route('events.list') }}`,
                editable: true,

                eventsSet: function() {
                    displayTodayEvents(); // Panggil fungsi setelah events selesai di-load
                },

                dateClick: function(info) {
                    $.ajax({
                        url: `{{ route('events.create') }}`,
                        data: {
                            start_date: info.dateStr,
                            end_date: info.dateStr
                        },
                        success: function(res) {
                            modal.html(res).modal('show');
                            $('.datepicker').datepicker({
                                todayHighlight: true,
                                format: 'yyyy-mm-dd'
                            });

                            $('#form-action').on('submit', function(e) {
                                e.preventDefault();
                                const form = this;
                                const formData = new FormData(form);
                                $.ajax({
                                    url: form.action,
                                    method: form.method,
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        modal.modal('hide');
                                        calendar.refetchEvents();
                                        displayTodayEvents();
                                    },
                                    error: function(res) {
                                        // Handle error if needed
                                    }
                                });
                            });
                        }
                    });
                },

                eventClick: function({
                    event
                }) {
                    $.ajax({
                        url: `{{ url('events') }}/${event.id}/edit`,
                        success: function(res) {
                            modal.html(res).modal('show');

                            $('#form-action').on('submit', function(e) {
                                e.preventDefault();
                                const form = this;
                                const formData = new FormData(form);
                                $.ajax({
                                    url: form.action,
                                    method: form.method,
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        modal.modal('hide');
                                        calendar.refetchEvents();
                                    }
                                });
                            });

                            // Update sidebar with clicked event
                            updateSidebar(event);
                        }
                    });
                },

                eventDrop: function(info) {
                    const event = info.event;
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
                            displayTodayEvents();
                        },
                        error: function(res) {
                            const message = res.responseJSON.message;
                            info.revert();
                            iziToast.error({
                                title: 'Error',
                                message: message ?? 'Something wrong',
                                position: 'topRight'
                            });
                        }
                    });
                },

                eventResize: function(info) {
                    const {
                        event
                    } = info;
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
                            displayTodayEvents();
                        },
                        error: function(res) {
                            const message = res.responseJSON.message;
                            info.revert();
                            iziToast.error({
                                title: 'Error',
                                message: message ?? 'Something wrong',
                                position: 'topRight'
                            });
                        }
                    });
                }
            });

            function displayTodayEvents() {
                const today = new Date();
                const events = calendar.getEvents();
                const todayEvents = events.filter(event => {
                    const eventStart = new Date(event.startStr);
                    const eventEnd = new Date(event.endStr);
                    return eventStart <= today && today <= eventEnd;
                });

                const eventList = $('#event-list');
                eventList.empty();

                if (todayEvents.length > 0) {
                    todayEvents.forEach(event => {

                        eventList.append(`<li>${event.title} </li>`);
                    });
                } else {
                    eventList.append('<li>No events today</li>');
                }
            }

            calendar.render();
            displayTodayEvents();

            function updateSidebar(event) {
                eventListEl.innerHTML = '';
                var li = document.createElement('li');
                li.innerText = event.title; // Hanya menampilkan judul
                eventListEl.appendChild(li);
            }

            fetch('/events/upcoming')
                .then(response => response.json())
                .then(events => {
                    if (events.length > 0) {
                        // Jika ada event yang memiliki reminder hari ini, tampilkan popup
                        showReminderPopup(events);
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        function showReminderPopup(events) {
            const eventTitles = events.map(event => event.title).join(", ");

            const popup = document.createElement('div');
            popup.className = 'popup-reminder';
            popup.innerHTML = `
        <h2>Reminder</h2>
        <p>${eventTitles}</p>
        <button class="close-btn">&times;</button>
    `;

            document.body.appendChild(popup);

            // Tampilkan popup dengan animasi
            setTimeout(() => {
                popup.classList.add('show');
            }, 100);

            // Tutup popup saat tombol X diklik
            document.querySelector('.close-btn').addEventListener('click', function() {
                popup.classList.remove('show');
                setTimeout(() => {
                    popup.remove();
                }, 500); // Durasi animasi keluar
            });

            // Auto close setelah 10 detik
            setTimeout(() => {
                popup.classList.remove('show');
                setTimeout(() => {
                    popup.remove();
                }, 500);
            }, 10000); // Popup tertutup otomatis setelah 10 detik
        }
    </script>


    <style>
        /* Gaya untuk spinner */
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #000;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 10px auto;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Overlay untuk menutup latar belakang */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        #sidebarMenu {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding: 15px;
            overflow-y: auto;
            z-index: 999;
        }

        /* Styling untuk popup reminder di pojok kanan bawah */
        .popup-reminder {
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.9), rgba(0, 75, 160, 0.9));
            padding: 15px;
            border-radius: 10px;
            width: 300px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1001;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.5s ease-in-out;
            color: white;
            /* Pastikan teks kontras dengan background */
        }

        /* Gaya saat popup muncul */
        .popup-reminder.show {
            opacity: 1;
            transform: translateY(0);
        }

        .popup-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 15px;
        }

        /* Gaya untuk tombol */
        .popup-reminder button {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .popup-reminder button:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        /* Gaya untuk tombol Close (X) */
        .popup-reminder .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: white;
        }

        .popup-reminder .close-btn:hover {
            color: #ccc;
        }

        /* Popup heading */
        .popup-reminder h2 {
            margin-top: 0;
            font-size: 16px;
            text-align: left;
            color: #fff;
        }

        /* Event list text */
        .popup-reminder p {
            font-size: 14px;
            text-align: left;
            margin-bottom: 10px;
            color: #f1f1f1;
        }

        /* Animasi keluar */
        @keyframes slideOut {
            to {
                opacity: 0;
                transform: translateY(50px);
            }
        }
    </style>



</body>
<footer class="footer mt-auto py-3 bg-dark text-white" style=" margin-top: 30px;">
    <div class="container text-center">
        <span class="text-muted">© 2024 SANTIK - All Rights Reserved.</span>
    </div>
</footer>

</html>
