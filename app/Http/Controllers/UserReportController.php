<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UserReportController extends Controller
{
    public function exportPdf()
    {
        // Data yang akan ditampilkan di PDF (Anda dapat menggantinya sesuai kebutuhan)
        $data = [
            'title' => 'Laporan Pengguna',
            'date' => date('m/d/Y'),
            'users' => \App\Models\User::all() // Ambil semua data pengguna
        ];

        // Generate PDF dari view
        $pdf = PDF::loadView('reports.users', $data);

        // Download PDF
        return $pdf->download('laporan_pengguna.pdf');
    }
}
