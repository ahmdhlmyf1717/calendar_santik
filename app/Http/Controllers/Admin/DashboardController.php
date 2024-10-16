<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Fungsi untuk menampilkan halaman dashboard admin
    public function index()
    {
        // Anda dapat menambahkan logika bisnis yang diperlukan di sini
        // Misalnya, mengambil data dari database untuk ditampilkan di dashboard

        return view('admin.dashboard'); // Ganti dengan view yang sesuai
    }
}
