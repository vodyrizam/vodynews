<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index', [
            'total' => Berita::where('status',2)->count(),
            'latest' => Berita::where('status',2)->latest()->limit(6)->get()
        ]);
    }

    public function show($slug)
    {
        $berita = Berita::whereSlug($slug)->firstOrFail();
        $berita->increment('viewed');

        return view('landing.show', compact('berita'));
    }
}
