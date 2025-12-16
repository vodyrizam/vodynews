<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Enums\BeritaStatus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardBeritaController extends Controller
{
    public function index(Request $request)
    {
        $beritas = Berita::query()
            ->when($request->judul, fn ($q) =>
                $q->where('judul', 'like', "%{$request->judul}%"))
            ->when($request->kategori, fn ($q) =>
                $q->where('kategori', $request->kategori))
            ->when($request->tanggal, fn ($q) =>
                $q->whereDate('tanggal_publikasi', $request->tanggal))
            ->latest()
            ->paginate(10);

        return view('dashboard.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('dashboard.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|min:5',
            'isi'      => 'required',
            'kategori' => 'required',
            'hashtag'  => 'nullable|string',
        ]);

        Berita::create([
            'penulis_id' => $request->user()->id,
            'judul'      => $request->judul,
            'slug'       => Str::slug($request->judul),
            'isi'        => $request->isi,
            'kategori'   => $request->kategori,
            'hashtag'    => $request->hashtag,
            'status'     => BeritaStatus::DRAFT, // menunggu validasi
        ]);

        return redirect('/dashboard/berita')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('dashboard.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul'    => 'required|min:5',
            'isi'      => 'required',
            'kategori' => 'required',
            'hashtag'  => 'nullable|string',
        ]);

        $berita->update([
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'isi'      => $request->isi,
            'kategori' => $request->kategori,
            'hashtag'  => $request->hashtag,
        ]);

        return redirect('/dashboard/berita')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        Berita::findOrFail($id)->delete(); // soft delete
        
        return back()->with('success', 'Berita berhasil dihapus');
    }

    public function publishPage(Request $request, $id)
    {
        if ($request->user()->role->name !== 'validator') {
            abort(403);
        }

        $berita = Berita::findOrFail($id);

        return view('dashboard.berita.publish', compact('berita'));
    }

    public function publish(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $berita->update([
            'status' => BeritaStatus::PUBLISH,
            'validator_id' => $request->user()->id,
            'tanggal_publikasi' => now(),
        ]);

        return back()->with('success', 'Berita berhasil dipublikasikan');
    }
}
