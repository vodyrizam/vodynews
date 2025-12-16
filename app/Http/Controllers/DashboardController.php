<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Total berita publish
        $totalPublish = Berita::where('status', 2)->count();

        // Statistik tambahan (bonus nilai)
        $totalDraft = Berita::where('status', 1)->count();

        $beritaPerKategori = Berita::where('status', 2)
            ->selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->get();

        return view('dashboard.index', [
            'totalPublish' => $totalPublish,
            'totalDraft' => $totalDraft,
            'beritaPerKategori' => $beritaPerKategori,
        ]);
    }
}
