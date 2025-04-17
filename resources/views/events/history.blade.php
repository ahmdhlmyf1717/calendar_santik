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
    @livewireStyles


    <title>Calendar SANTIK</title>
    <link rel="icon" href="{{ asset('assets/images/santik-logo.png') }}" type="image/png">
</head>

<body>
    @livewireScripts

    <div class="container-fluid">
        <div class="row">
            <div class="mt-2 brand-logo d-flex align-items-center justify-content-between">
            </div>

            <nav id="sidebarMenu"
                class="sidebar-nav scroll-sidebar col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse shadow-sm"
                data-simplebar="" style="min-width: 200px; max-width: 400px; resize: horizontal; overflow: auto;">
                <div class="">
                    <a href="#" class="text-nowrap logo-img"
                        style="margin-top: 30px; display: inline-block; margin-left: 10px;">
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
                            <a class="sidebar-link text-white d-flex align-items-center"
                                href="{{ route('events.index') }}" aria-expanded="false">
                                <span><i class="bi bi-house-door me-3"></i></span>
                                <span class="hide-menu">Calendar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link active text-white d-flex align-items-center" href="#"
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
                </div>


            </nav>

            <style>
                .resize-handle {
                    width: 30px;
                    height: 100%;
                    background: transparent;
                    position: absolute;
                    right: 0;
                    top: 0;
                    cursor: ew-resize;
                }

                .sidebar-nav {
                    width: 310px !important;
                    min-width: 250px !important;
                    max-width: 500px !important;
                }

                #sidebar h3 {
                    color: white !important;
                }

                .sidebar-item .sidebar-link.active {
                    color: white !important;
                }
            </style>





            <script>
                const sidebar = document.getElementById('sidebarMenu');
                const resizer = document.getElementById('resizer');

                resizer.addEventListener('mousedown', function(e) {
                    document.addEventListener('mousemove', resizeSidebar);
                    document.addEventListener('mouseup', function() {
                        document.removeEventListener('mousemove', resizeSidebar);
                    });
                });

                function resizeSidebar(e) {
                    const newWidth = e.clientX;
                    if (newWidth >= 200 && newWidth <= 400) { // Batas minimal dan maksimal lebar
                        sidebar.style.width = newWidth + 'px';
                    }
                }
            </script>

            <style>
                .nav-link:hover {
                    background-color: #343a40;
                    color: #f8f9fa;
                }

                /* Gaya untuk #sidebar */
                /* Gaya untuk sidebar */
                #sidebar {
                    padding: 15px;
                    background-color: #5d87ff;
                    border: 1px solid #5d87ff;
                    width: 100%;
                    max-width: 100%;
                    overflow: hidden;
                    border-radius: 7px;
                    box-sizing: border-box;
                }

                /* Gaya untuk event list */
                #event-list {
                    list-style-type: none;
                    padding: 0;
                    margin: 0;
                    width: 100%;
                    /* Memastikan event list mengikuti lebar sidebar */
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
                    border-radius: 7px;
                    position: relative;
                    /* Agar simbol tetap berada di dalam elemen */
                }

                /* Efek hover untuk item di event list */
                #event-list li:hover {
                    background-color: #f0f0f0;
                    /* Beri sedikit warna saat hover */
                }

                /* Simbol untuk setiap event */
                #event-list li:before {
                    content: '';
                    display: block;
                    width: 8px;
                    height: 8px;
                    background-color: #0d6efd;
                    border-radius: 50%;
                    position: absolute;
                    left: -12px;
                    /* Disesuaikan agar tetap dalam batas sidebar */
                    top: 50%;
                    transform: translateY(-50%);
                }


                h3 {
                    font-weight: bold;
                    /* Menebalkan judul */
                    color: #343a40;
                    /* Warna judul */
                    margin-bottom: 15px;
                    /* Jarak bawah judul */
                }

                .modal {
                    position: fixed;
                    /* Modal tidak mempengaruhi layout */
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    /* Tambahkan scrollbar jika diperlukan */
                    z-index: 1050;
                    /* Pastikan modal di atas semua elemen lainnya */
                }
            </style>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-9 pt-0">




                @if ($pastEvents->isEmpty())
                    <p>Event tidak ditemukan.</p>
                @else
                    <table class="table">
                        <form method="GET" action="{{ route('events.search') }}" class="mb-3" id="searchForm">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <input type="text" name="search" id="searchInput"
                                        value="{{ request('search') }}" class="form-control"
                                        placeholder="Search by title">
                                </div>
                            </div>
                        </form>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                // Ketika input berubah, kirimkan pencarian otomatis
                                $('#searchInput').on('input', function() {
                                    var searchValue = $(this).val(); // Ambil nilai input pencarian
                                    var url = '{{ route('events.search') }}'; // Ambil URL pencarian dari route

                                    // Kirim permintaan GET secara otomatis
                                    $.get(url, {
                                        search: searchValue
                                    }, function(data) {
                                        // Gantikan konten tabel dengan data baru
                                        $('table tbody').html(data);
                                    });
                                });
                            });
                        </script>


                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="title">Title</th>
                                <th class="start">Start Date</th>
                                <th class="end">End Date</th>
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
                                    <td>
                                        <span class="reminder {{ $event->reminder ? 'reminder-yes' : 'reminder-no' }}">
                                            {{ $event->reminder ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{-- paginate --}}
                    <div class="pagination-container d-flex justify-content-start">
                        {{ $pastEvents->links('pagination::bootstrap-4') }}
                    </div>

                    <style>
                        .pagination-container {
                            position: relative;
                            padding-bottom: 10px;
                            text-align: left;
                        }
                    </style>



                @endif



            </main>
        </div>

    </div>


    <style>
        /* Overlay untuk menutup latar belakang */
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
            /* pastikan sidebar berada di atas */
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Transparan hitam */
            z-index: 999;
        }

        /* Styling untuk popup */
        .popup-reminder {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1001;
        }

        .popup-buttons {
            display: flex;
            justify-content: center;
            /* Pastikan tombol ada di tengah */
            gap: 15px;
            /* Jarak antar tombol */
            margin-top: 20px;
        }

        .popup-buttons button {
            padding: 10px 20px;
            font-size: 16px;
        }



        /* Popup heading */
        .popup-reminder h2 {
            margin-top: 0;
            color: #333;
            font-size: 18px;
        }

        /* Event list text */
        .popup-reminder p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Close button */
        .popup-reminder button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .popup-reminder button:hover {
            background-color: #0056b3;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
        }

        /* CSS Style untuk history event */

        /* untuk table */
        /* Table Styling */
        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            border: 2px solid #ddd;
            /* Garis di sekeliling tabel */
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
            /* Garis antar sel */
            font-size: 1.1em;
            color: #333;
            vertical-align: middle;
        }

        /* Header kolom */
        .table th {
            background-color: #3f51b5;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* Kolom reminder khusus */
        .table td .reminder {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
            text-align: center;
        }

        /* Reminder badge styling opsional */
        .reminder-yes {
            background-color: #4caf50;
            color: white;
        }

        .reminder-no {
            background-color: #f44336;
            color: white;
        }


        /* Kolom judul dan data harus konsisten dalam ukuran */
        .table th,
        .table td {
            padding: 15px;
            text-align: left;
        }

        /* Styling untuk memastikan setiap kolom (Title, Start Date, End Date, Reminder) sejajar */
        .table th.title,
        .table td.title {
            width: 25%;
        }

        .table th.start,
        .table td.start {
            width: 25%;
        }

        .table th.end,
        .table td.end {
            width: 25%;
        }

        .table th.reminder,
        .table td.reminder {
            width: 25%;
        }

        /* Container Styling */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f7f9fc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Heading Styling */
        h1 {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #e1e4e8;
            font-size: 1.1em;
            color: #333;
        }

        /* Table Header Styling */
        .table th {
            background-color: #3f51b5;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* Table Row Styling */
        .table tbody tr {
            background-color: #fff;
            transition: all 0.3s ease;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f1f3f6;
        }

        /* Table Row Hover Effect */
        .table tbody tr:hover {
            background-color: #e3e7ee;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        /* Reminder Styling */
        .table td .reminder {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .reminder-yes {
            background-color: #28a745;
            color: #fff;
        }

        .reminder-no {
            background-color: #dc3545;
            color: #fff;
        }

        /* Centered Empty State Message */
        p {
            text-align: center;
            font-size: 1.3em;
            color: #888;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            .table th,
            .table td {
                padding: 10px;
                font-size: 1em;
            }

            h1 {
                font-size: 2em;
            }
        }

        /* Styling untuk container pagination */
        .pagination-container {
            margin-top: 30px;
            /* Menambah jarak antara tabel dan pagination */
            text-align: center;
        }

        /* Menata tampilan pagination */
        .pagination {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            list-style: none;
            background-color: transparent;
        }
    </style>

</body>


</html>
